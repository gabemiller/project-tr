<?php

namespace Site;

use Divide\CMS\Document;
use View;

class DocumentController extends \BaseController {

    protected $layout = '_frontend.master';

    /**
     * Display a listing of the resource.
     * GET /site\document
     *
     * @return Response
     */
    public function index() {
        View::share('title','Dokumentumok');
        
        $this->layout->content = View::make('site.document.index')->with('documents',Document::all());
    }

}
