<?php

namespace App\Http\Controllers;

use App\Model\CrumbElementInterface;
use App\Repository\ResourceRepository;
use Creitive\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class ResourceController extends Controller
{
    /** @var string */
    protected $viewsDir = 'resources';

    /** @var int */
    protected $nbPerPage = 10;

    /** @var ResourceRepository */
    protected $repository;

    /** @var Model */
    protected $model;

    /** @var string */
    protected $resource;

    /** @var array */
    protected $rules = [];

    /** @var array */
    protected $storeRules = [];

    /** @var array */
    protected $updateRules = [];

    public function __construct()
    {
        $this->middleware('auth');

        $this->addCrumb('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->getView('index'), ['items' => $this->repository->paginate($this->nbPerPage)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->addCrumb('create');

        $viewData = array_merge([
            'item' => new $this->model(),
            'formMethod' => 'POST',
            'formUrl' => route($this->getRoute('store'))
        ], $this->getFormData());

        $viewData = $this->preCreate($viewData);

        return view($this->getView('create'), $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = $this->getValidator($request, $this->storeRules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $this->repository->store($request->all());

        return redirect()->route($this->getRoute('index'))->with('success', sprintf('Saved %s', $this->resource));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->repository->getById($id);
        $this->addCrumb('show', $item, [$id]);

        return view($this->getView('show'), ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->repository->getById($id);
        $this->addCrumb('show', $item, [$id]);

        $viewData = array_merge([
            'item' => $item,
            'formMethod' => 'PUT',
            'formUrl' => route($this->getRoute('update'), [$id])
        ], $this->getFormData());

        $viewData = $this->preEdit($viewData);

        return view($this->getView('edit'), $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = $this->getValidator($request, $this->updateRules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $this->repository->update($id, $request->all());

        return redirect()->route($this->getRoute('index'))->with('success', sprintf('Updated %s', $this->resource));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);

        return back()->with('success', sprintf('Destroyed %s', $this->resource));
    }

    protected function getFormData(): array
    {
        return [];
    }

    protected function preCreate(array $viewData): array
    {
        return $viewData;
    }

    protected function preEdit(array $viewData): array
    {
        return $viewData;
    }

    protected function getValidator(Request $request, array $rules)
    {
        $rules = array_merge($this->rules, $rules);

        return Validator::make($request->all(), $rules);
    }

    protected function getView(string $action): string
    {
        return sprintf('%s.%s.%s', $this->viewsDir, $this->resource, $action);
    }

    protected function getRoute(string $action): string
    {
        return sprintf('%s.%s', $this->resource, $action);
    }

    protected function getTranslation(string $action): string
    {
        return sprintf('%s.%s', $this->resource, $action);
    }

    protected function addCrumb(string $action, CrumbElementInterface $item = null, array $routeArgs = array())
    {
        $translation = $this->getTranslation('breadcrumbs.' . $action);
        $render = $item !== null ? trans($translation, ['item' => $item->getCrumb()]) : trans($translation);

        Breadcrumbs::addCrumb($render, route($this->getRoute($action), $routeArgs));
    }
}
