<?php
function pagination($total_items, $limit, $current_page, $links = '') {
    $total_pages = ceil($total_items / $limit);
    if ($total_pages <= 1) return '';

    $current_page = max(1, min($current_page, $total_pages));

    $html = '<nav><ul class="pagination justify-content-center">';

    // Previous button
    if ($current_page > 1) {
        $prev = $current_page - 1;
        $html .= '<li class="page-item"><a class="page-link" href="index.php?m='.$_GET['m'].'&a='.$_GET['a'].'&'.$links.'&page='.$prev.'">&laquo; Prev</a></li>';
    }

    // First page
    if ($current_page > 4) {
        $html .= '<li class="page-item"><a class="page-link" href="index.php?m='.$_GET['m'].'&a='.$_GET['a'].'&'.$links.'&page=1">1</a></li>';
        if ($current_page > 5) $html .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
    }

    // Nearby pages
    $start = max(1, $current_page - 3);
    $end = min($total_pages, $current_page + 3);

    for ($i = $start; $i <= $end; $i++) {
        if ($i == $current_page) {
            $html .= '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
        } else {
            $html .= '<li class="page-item"><a class="page-link" href="index.php?m='.$_GET['m'].'&a='.$_GET['a'].'&'.$links.'&page='.$i.'">'.$i.'</a></li>';
        }
    }

    // Last page
    if ($current_page < $total_pages - 3) {
        if ($current_page < $total_pages - 4) $html .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
        $html .= '<li class="page-item"><a class="page-link" href="index.php?m='.$_GET['m'].'&a='.$_GET['a'].'&'.$links.'&page='.$total_pages.'">'.$total_pages.'</a></li>';
    }

    // Next button
    if ($current_page < $total_pages) {
        $next = $current_page + 1;
        $html .= '<li class="page-item"><a class="page-link" href="index.php?m='.$_GET['m'].'&a='.$_GET['a'].'&'.$links.'&page='.$next.'">Next &raquo;</a></li>';
    }

    $html .= '</ul></nav>';
    return $html;
}
?>