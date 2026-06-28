<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PDO;

class SyncToSqlite extends Command
{
    protected $signature = 'sync:sqlite';
    protected $description = 'Sync all data from MySQL to SQLite for Vercel deployment';

    private $sqlite;

    public function handle()
    {
        $this->sqlite = new PDO('sqlite:' . database_path('database.sqlite'));
        $this->sqlite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $tables = [
            'contents', 'hero_sections', 'products', 'our_principles',
            'our_teams', 'testimonials', 'project_clients',
            'company_statistics', 'appointments', 'company_abouts',
            'company_keypoints', 'users', 'posts',
        ];

        foreach ($tables as $table) {
            $this->syncTable($table);
        }

        $this->syncPermissions();

        $this->info('All data synced to SQLite successfully!');
    }

    private function syncTable($table)
    {
        $mysqlRows = DB::table($table)->get();

        if ($mysqlRows->isEmpty()) {
            $this->warn("Table '{$table}' is empty, skipped.");
            return;
        }

        $columns = array_keys((array) $mysqlRows->first());
        $columns = array_filter($columns, fn($c) => !is_numeric($c));
        $columns = array_values($columns);

        $this->sqlite->exec("DELETE FROM {$table}");

        $placeholders = rtrim(str_repeat('?,', count($columns)), ',');
        $insert = $this->sqlite->prepare(
            "INSERT INTO {$table} (" . implode(',', $columns) . ") VALUES ({$placeholders})"
        );

        $count = 0;
        foreach ($mysqlRows as $row) {
            $row = (array) $row;
            $vals = [];
            foreach ($columns as $col) {
                $vals[] = $row[$col] ?? null;
            }
            $insert->execute($vals);
            $count++;
        }

        $this->info("Synced {$count} rows to '{$table}'");
    }

    private function syncPermissions()
    {
        $permTables = ['permissions', 'roles', 'model_has_permissions', 'model_has_roles', 'role_has_permissions'];
        foreach ($permTables as $table) {
            $this->syncTable($table);
        }
    }
}
