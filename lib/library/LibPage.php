<?php

/**
 * 分页
 *
 * @author a-yi
 */
class LibPage {
	/**
	 * 分页函数
	 *
	 * @param string $url_format 页面URL，不含page
	 * @param int $total 总数据量
	 * @param int $thisPage 当前页数
	 * @param int $pageNum 每页数目
	 * @param string $defaultFile 第一页文件名
	 * @return array
	 */
	public static function page($url_format, $total, $thisPage = 1, $pageNum = 10, $defaultFile = ''){
		$thisPage = intval($thisPage);
		$thisPage = $thisPage == 0 ? 1 : $thisPage;
		$init_show_nums = 6;//刚开始显示最大个数，如果超过10就加1，直至显示的个数等于$max_show_nums
		$max_show_nums = 6;//最大显示
		$total_nums = ceil($total / $pageNum);
		$start = 1;
		$nums = $total_nums;

		if($total_nums > $init_show_nums){
			$nums = $init_show_nums + $thisPage - 1;
			if($nums <= $max_show_nums){
				$start = 1;
			}else{
				if($thisPage < ceil($max_show_nums / 2)){
					$start = 1;
				}else{
					$start = $thisPage - ceil($max_show_nums / 2) + 1;
				}
				$nums = $max_show_nums;
			}
			if($start + $nums - 1 > $total_nums){
				$nums = $max_show_nums;
				$start = $total_nums - $nums + 1;
			}
		}


		$lastPage = $thisPage - 1 > 0 ? $thisPage - 1 : 0;//上一页
		$nextPage = $thisPage + 1 <= $total_nums ? $thisPage + 1 : 0;//下一页
		$showpages = '';

		if($total_nums > 1){
			if(preg_match('/page\=\d+/',$url_format)>0){
				$url_format = preg_replace('/page\=\d+/','page={page}',$url_format);
			}
			//首页
			if($lastPage){
				$url = str_replace('{page}', $defaultFile ? ($lastPage == 1 ? $defaultFile : $lastPage) : $lastPage, $url_format);
				$showpages .= "<a href='{$url}'>&lt;</a>\r\n";
			}else{
				$showpages .= "<a href='javascript:;'>&lt;</a>\r\n";
			}

			//连续翻页
			$i = $start;
			$count = 1;
			while($count <= $nums){
				$count++;
				$url = str_replace('{page}', $defaultFile ? ($i == 1 ? $defaultFile : $i) : $i, $url_format);
				if($i == $thisPage){
					$showpages .= '<a class="pagecurrent" href="'.$url.'">'.$i.'</a>'."\r\n";
				}else{
					$showpages .= "<a href='{$url}'>{$i}</a>\r\n";
				}

				$i++;
			}
			//下一页
			if($nextPage){
				$url = str_replace('{page}', $defaultFile ? ($nextPage == 1 ? $defaultFile : $nextPage) : $nextPage, $url_format);
				$showpages .= "<a href='{$url}'>&gt;</a>";
			}else{
				$showpages .= "<a href='javascript:;'>&gt;</a>";
			}
		}else{
			$showpages = '';
		}
		return $showpages;
	}
}

