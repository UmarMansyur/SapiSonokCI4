<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterPeternak implements FilterInterface
{

  public function before(RequestInterface $request, $argument = null)
  {
    if(session()->get('status_admin') == '0'){
      return redirect()->to('/profile');
    }
  }
  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    if(session()->get('status_admin') == '0'){
      return redirect()->to('/profile');
    }
  }
}
