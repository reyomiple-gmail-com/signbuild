<?php 

class Pagination
{
	private $limit;
	private $total_data;
	private $page;
	private $link;
	private $params = null;

	public function set_limit($limit)
	{
		$this->limit = $limit;
		return $this->limit;
	}

	public function set_link($link)
	{
		$this->link = $link;
	}

	public function set_params($params)
	{
		$this->params = $params;
	}

	public function set_page($page)
	{
		$this->page = $page;
	}


	public function set_total_data($total)
	{
		if($total == null)
			return false;
		
		$this->total_data = $total;
	}

	public function paginate()
	{
		$value = '';
		$this->total_data = count($this->total_data);
		$page_count = ceil($this->total_data / $this->limit);

		if($this->total_data % $this->limit != 0)
		{
			$page_count++;
		}

		$start = (($this->page - 3) > 0) ? $this->page - 3 : 0;
		$end = (($this->page + 3) < $page_count) ? $this->page + 3 : ($page_count - 1);

		$value = '<ul class="pagination">';

		if($this->page > 1)
		{

			$value .= '<li class="page-item">
      						<a class="page-link" href="'.URL.'/'.$this->link.'/'.($this->page - 1).$this->params.'">&laquo;</a>
    					</li>';	
		}

		for ($x=$start; $x < $end; $x++) { 
			$active_class = '';
			if(($this->page - 1) == $x){$active_class = 'active';}
				$value .= '<li class="page-item '.$active_class.'">
     						 <a class="page-link" href="'.URL.'/'.$this->link.'/'.($x + 1).$this->params.'">'.($x + 1).'</a>
    						</li>';

		}

		if($this->page < ($page_count - 1))
		{
			$value .= '<li class="page-item">
      						<a class="page-link" href="'.URL.'/'.$this->link.'/'.($this->page + 1).$this->params.'">&raquo;</a>
    					</li>
    					';	
		}
		$value .='</ul>';
		unset($this->params);
		return $value;
	}
}

