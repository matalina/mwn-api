<?php

use App\Notebook\Folder;
use App\Notebook\MetaData;
use App\Notebook\Page;
use App\Notebook\Project;
use App\Notebook\User;
use Illuminate\Database\Seeder;

class SetupApp extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Starting User
        $user = User::create([
            'pen_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'is_owner' => 1,
        ]);

        // Starting Meta Data
        MetaData::create([
            'name' => 'Point of View'
        ]);

        MetaData::create([
            'name' => 'Location'
        ]);

        MetaData::create([
            'name' => 'Date/Time'
        ]);

        MetaData::create([
            'name' => 'Character Appearances',
            'allow_multiple' => 1,
        ]);

        MetaData::create([
            'name' => 'Chapter'
        ]);

        MetaData::create([
            'name' => 'Arc'
        ]);

        MetaData::create([
            'name' => 'Goal'
        ]);

        MetaData::create([
            'name' => 'Conflict'
        ]);

        MetaData::create([
            'name' => 'Disaster'
        ]);

        MetaData::create([
            'name' => 'Reaction'
        ]);

        MetaData::create([
            'name' => 'Dilemma'
        ]);

        MetaData::create([
            'name' => 'Decision'
        ]);

        // Samples
        $project = Project::create([
            'name' => 'Starter Project',
            'ordering' => 0,
            'user_id' => $user->id,
        ]);

        $folder = Folder::create([
            'name' => 'First Folder',
            'ordering' => 0,
            'project_id' => $project->id,
            'folder_id' => null,
            'user_id' => $user->id,
        ]);

        $page = Page::create([
            'title' => 'First Page',
            'body' => File::get(resource_path('examples/first_page.md')),
            'extension' => 'md',
            'ordering' => 0,
            'project_id' => $project->id,
            'folder_id' => null,
            'user_id' => $user->id,
        ]);

        $page->updateSlug();

        $page = Page::create([
            'title' => 'Nested Page',
            'body' => File::get(resource_path('examples/nested_page.md')),
            'extension' => 'md',
            'ordering' => 0,
            'project_id' => $project->id,
            'folder_id' => $folder->id,
            'user_id' => $user->id,
        ]);

        $page->updateSlug();
    }
}