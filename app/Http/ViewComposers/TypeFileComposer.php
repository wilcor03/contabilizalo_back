<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Blog\TypeFile;

class TypeFileComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $type_files;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(TypeFile $type_files)
    {        
        $this->type_files = $type_files;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $type_files = $this->type_files->pluck('name', 'id');        
        $view->with(compact('type_files'));
    }
}