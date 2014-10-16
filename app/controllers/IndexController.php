<?php

class IndexController extends BaseController {

    public function getIndex() {
        $planets = Planet::with('author')->orderBy('created_at', 'DESC')->take(6)->get();
        $counter = Planet::count();

        return View::make('indexx', compact('planets','counter'));
    }
}
