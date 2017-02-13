<?php namespace App\Notebook;

class NotebookObject implements NotebookInterface
{
    protected $notebook;
    
    public function __construct()
    {
        $this->notebook = []; // Array of Collections;
    }
    
    protected function sortByOrdering($collection) 
    {
        $sort = $collection->sortedBy('ordering');
        return $sort->values()->all();
    }
    
    protected sluggify($collection)
    {
        return str_slug({$collection}->name).'-'.{$collection}->id,
    }
    
    public function getCompleteNotebookHierarchy()
    {
        $id = \Auth::user()->id;
        
        $projects = Project::where('user_id','=', $id)
            ->get();
        $projects = $this->sortByOrdering($collection);
        
        
        foreach($projects as $project) {
            $temp = [
                'name' => $project->name,
                'type' => 'folder', // projects are folders
                'slug' => $this->sluggify($project),
            ];
            
            $folders = Folder::where('project_id','=',$project->id)
                ->get();
            
            foreach($folders as $folder) {
                $temp['folders'][] = $this->getSortedNestedItems($folder);
            }
            
            
            
            
            $this->notebook[] = collect($temp);
        }
    }
    
    
}