<?php

function user_login()
{
  $db = db_connect();
  return $db->table('peternak')
            ->where('id_peternak', session('id_peternak'))
            ->get()
            ->getRow();
}
