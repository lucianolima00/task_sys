<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $tasks = [
            ['name'=>'Design homepage', 'description'=>'Create a modern homepage design.', 'project'=>'Website Redesign'],
            ['name'=>'Implement responsive layout', 'description'=>'Ensure mobile-friendly design.', 'project'=>'Website Redesign'],
            ['name'=>'Develop contact page', 'description'=>'Include contact form and map.', 'project'=>'Website Redesign'],
            ['name'=>'Setup backend API', 'description'=>'Build REST API for mobile app.', 'project'=>'Mobile App Development'],
            ['name'=>'Create login screen', 'description'=>'Design and implement login functionality.', 'project'=>'Mobile App Development'],
            ['name'=>'Push notifications', 'description'=>'Implement push notification system.', 'project'=>'Mobile App Development'],
            ['name'=>'Plan ad budget', 'description'=>'Allocate resources for Q4 campaign.', 'project'=>'Marketing Campaign'],
            ['name'=>'Draft marketing emails', 'description'=>'Prepare email templates for campaign.', 'project'=>'Marketing Campaign'],
            ['name'=>'Social media posts', 'description'=>'Schedule posts across platforms.', 'project'=>'Marketing Campaign'],
            ['name'=>'Upgrade workflow tool', 'description'=>'Install latest version and migrate data.', 'project'=>'Internal Tool Upgrade'],
            ['name'=>'Automate reporting', 'description'=>'Add automated reports for managers.', 'project'=>'Internal Tool Upgrade'],
            ['name'=>'Team training', 'description'=>'Train team on new workflow tool.', 'project'=>'Internal Tool Upgrade'],
            ['name'=>'Implement ticketing system', 'description'=>'Set up customer support software.', 'project'=>'Customer Support System'],
            ['name'=>'Staff training for support', 'description'=>'Train support team on new system.', 'project'=>'Customer Support System'],
            ['name'=>'Optimize SEO keywords', 'description'=>'Research and implement SEO keywords.', 'project'=>'SEO Optimization'],
            ['name'=>'Update meta tags', 'description'=>'Update meta tags for all pages.', 'project'=>'SEO Optimization'],
            ['name'=>'Build shopping cart', 'description'=>'Develop e-commerce cart functionality.', 'project'=>'E-commerce Platform'],
            ['name'=>'Integrate payment gateway', 'description'=>'Add PayPal and Stripe support.', 'project'=>'E-commerce Platform'],
            ['name'=>'Create product catalog', 'description'=>'Add all products with categories.', 'project'=>'E-commerce Platform'],
            ['name'=>'Design analytics dashboard', 'description'=>'Show key metrics in charts.', 'project'=>'Analytics Dashboard'],
            ['name'=>'Integrate with CRM', 'description'=>'Connect dashboard with CRM data.', 'project'=>'Analytics Dashboard'],
            ['name'=>'Setup employee onboarding', 'description'=>'Create automated onboarding workflow.', 'project'=>'HR Onboarding'],
            ['name'=>'Prepare training materials', 'description'=>'Write docs and guides.', 'project'=>'HR Onboarding'],
            ['name'=>'Conduct security audit', 'description'=>'Check for vulnerabilities.', 'project'=>'Security Audit'],
            ['name'=>'Fix security issues', 'description'=>'Patch all found vulnerabilities.', 'project'=>'Security Audit'],
            ['name'=>'Add FAQ page', 'description'=>'Include common questions.', 'project'=>'Website Redesign'],
            ['name'=>'Improve mobile performance', 'description'=>'Optimize images and scripts.', 'project'=>'Website Redesign'],
            ['name'=>'User feedback collection', 'description'=>'Add feedback form.', 'project'=>'Website Redesign'],
            ['name'=>'Test mobile app', 'description'=>'QA testing on Android and iOS.', 'project'=>'Mobile App Development'],
            ['name'=>'Implement analytics', 'description'=>'Add tracking and reporting.', 'project'=>'Mobile App Development'],
            ['name'=>'Optimize email templates', 'description'=>'Improve open and click rates.', 'project'=>'Marketing Campaign'],
            ['name'=>'Set up marketing automation', 'description'=>'Use automation tools.', 'project'=>'Marketing Campaign'],
            ['name'=>'Backup workflow data', 'description'=>'Ensure all data is backed up.', 'project'=>'Internal Tool Upgrade'],
            ['name'=>'Update documentation', 'description'=>'Keep workflow docs current.', 'project'=>'Internal Tool Upgrade'],
            ['name'=>'Customer feedback integration', 'description'=>'Connect feedback to CRM.', 'project'=>'Customer Support System'],
            ['name'=>'Improve support ticket SLA', 'description'=>'Reduce response time.', 'project'=>'Customer Support System'],
            ['name'=>'SEO content writing', 'description'=>'Write blog posts with keywords.', 'project'=>'SEO Optimization'],
            ['name'=>'SEO link building', 'description'=>'Add internal and external links.', 'project'=>'SEO Optimization'],
            ['name'=>'Test e-commerce checkout', 'description'=>'Ensure payments process correctly.', 'project'=>'E-commerce Platform'],
            ['name'=>'Optimize product images', 'description'=>'Reduce size for faster loading.', 'project'=>'E-commerce Platform'],
            ['name'=>'Add reporting filters', 'description'=>'Allow custom date ranges.', 'project'=>'Analytics Dashboard'],
            ['name'=>'Set up alerts', 'description'=>'Email alerts for key metrics.', 'project'=>'Analytics Dashboard'],
            ['name'=>'Employee welcome emails', 'description'=>'Send automated emails.', 'project'=>'HR Onboarding'],
            ['name'=>'Schedule onboarding sessions', 'description'=>'Organize training sessions.', 'project'=>'HR Onboarding'],
            ['name'=>'Review system permissions', 'description'=>'Ensure security policies are enforced.', 'project'=>'Security Audit'],
            ['name'=>'Penetration testing', 'description'=>'Test system security.', 'project'=>'Security Audit'],
            ['name'=>'Update homepage CTA', 'description'=>'Make call-to-action more visible.', 'project'=>'Website Redesign'],
            ['name'=>'Add blog section', 'description'=>'Create a blog for marketing.', 'project'=>'Website Redesign'],
            ['name'=>'Push app updates', 'description'=>'Release new version to stores.', 'project'=>'Mobile App Development'],
            ['name'=>'User onboarding flow', 'description'=>'Simplify first-time user experience.', 'project'=>'Mobile App Development'],
            ['name'=>'Create ad graphics', 'description'=>'Design images for ads.', 'project'=>'Marketing Campaign'],
            ['name'=>'Social media monitoring', 'description'=>'Track brand mentions.', 'project'=>'Marketing Campaign'],
            ['name'=>'Audit workflow performance', 'description'=>'Analyze team efficiency.', 'project'=>'Internal Tool Upgrade'],
            ['name'=>'Optimize workflow scripts', 'description'=>'Improve automation scripts.', 'project'=>'Internal Tool Upgrade'],
        ];

        $priority = 1;
        foreach ($tasks as $taskData) {
            $project = $projects->where('name', $taskData['project'])->first();
            if ($project) {
                Task::create([
                    'name' => $taskData['name'],
                    'description' => $taskData['description'],
                    'priority' => $priority++,
                    'project_id' => $project->id,
                ]);
            }
        }
    }
}
