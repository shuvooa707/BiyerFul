<?php

namespace Biyerful\controller;

use Biyerful\factory\UserFactory;

class SeederController extends Controller
{

    function index()
    {
        
    }

    function show($param)
    {
        
        exit(0);
    }

    function create()
    {
        
        exit(0);
    }

    function store()
    {
        
        exit(0);
    }

    function edit()
    {
        
        exit(0);
    }

    function update()
    {
        die;
    }

    function destroy()
    {
        
    }

    public function make() 
    {
        $userFactory = new UserFactory();
        // dd($userFactory);
        $userFactory->populate(100);
    }
}
