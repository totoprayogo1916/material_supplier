<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Material as ModelsMaterial;
use App\Models\Supplier;
use Config\Services;

class Material extends BaseController
{
    public function index()
    {
        $materialModel = new ModelsMaterial();
        $search = $this->request->getGet('query');

        if(is_numeric( $search )) {
            $materialModel->where('buy_price', $search);
        }

        $data = [
            'materials' => $materialModel->findAll(),
            'search' => $search
        ];

        return view('material/view', $data);
    }

    function create()
    {
        $supplierModel = new Supplier();

        $supplier_options = [];

        foreach ($supplierModel->findAll() as $supplier) {
            $supplier_options[$supplier->id] = esc($supplier->name);
        }

        return view('material/create', compact('supplier_options'));
    }

    function submit()
    {
        $validation = Services::validation();

        $validation->setRules([
            'code' => ['label' => 'material code', 'rules' => 'required'],
            'name' => ['label' => 'material name', 'rules' => 'required'],
            'type' => ['label' => 'material type', 'rules' => 'required'],
            'buy_price' => ['label' => 'material type', 'rules' => 'required|integer|greater_than[100]'],
            'supplier_id' => ['label' => 'supplier', 'rules' => 'required|integer'],
        ]);

        if(!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $materialModel = new ModelsMaterial();

        $materialModel->save([
            'code' => $this->request->getPost('code'),
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),
            'buy_price' => $this->request->getPost('buy_price'),
            'supplier_id' => $this->request->getPost('supplier_id'),
        ]);

        return redirect()->route('material.view')->with('message', 'success');
    }

    function delete($id) 
    {
        $supplierModel = new ModelsMaterial();
        $supplierModel->delete($id);

        return redirect()->route('material.view')->with('message', 'order deleted');

    }
}
