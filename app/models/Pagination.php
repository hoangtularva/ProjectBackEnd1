<?php
class Pagination
{
    public function createPageLinks($url, $totalRow, $perPage, $page)
    {
        $prev = '';
        $output = '<nav aria-label="Page navigation">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>';
         
         $totalPage = ceil($totalRow / $perPage);

        for ($i = 1; $i <= $totalPage; $i++) {
            $active ='';
            if ($page == $i) {
               $active = "active";
            }  
            $output .= "<li class='page-item $active'><a class ='page-link' href ='$url?page=$i'>$i</a>";
        }

        $output .= '<li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>';
        return $output;
    }
}
