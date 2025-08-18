<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            ['name' => 'Website Redesign', 'description' => 'Complete overhaul of the corporate website.'],
            ['name' => 'Mobile App Development', 'description' => 'Develop Android and iOS applications.'],
            ['name' => 'Marketing Campaign', 'description' => 'Launch a new marketing campaign for Q4.'],
            ['name' => 'Internal Tool Upgrade', 'description' => 'Upgrade internal tools and workflow automation.'],
            ['name' => 'Customer Support System', 'description' => 'Implement a new ticketing system for support team.'],
            ['name' => 'SEO Optimization', 'description' => 'Improve search engine rankings for the website.'],
            ['name' => 'E-commerce Platform', 'description' => 'Build an online store with payment integration.'],
            ['name' => 'Analytics Dashboard', 'description' => 'Create dashboard for marketing and sales metrics.'],
            ['name' => 'HR Onboarding', 'description' => 'Automate employee onboarding process.'],
            ['name' => 'Security Audit', 'description' => 'Perform security audit and fix vulnerabilities.'],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
