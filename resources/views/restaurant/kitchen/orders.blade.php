@foreach ($orders as $key=>$order){
$modifier=$this->getmodifier($order->order_id);

$output .='<tr>
    <td>'.($key+1).' </td>
    <td>'.$order->kitchen.' </td>
    <td>#'.$order->invoice_no.' </td>
    <td>'.$order->table_name.' </td>';

    if($order->producttype === 'variable')
    $output .='  <td> '.$order->productname.'( '.$order->variation.' ) </td>';
    else
    $output .='  <td> '.$order->productname.'</td>';


    $output .='<td>'. $modifier.'</td>';
    $output .='<td>'. $order->sell_line_note.'</td>';

    $output .='<td> '.number_format($order->quantity,2).'</td>';

    if($order->kitchen_status==0)
    $output .='<td class="ordermark"><span>جديد</span> </td>
    <td ><button class="btn  btn-primary" onclick="setstatsu(1,'.$order->order_id.')">  <i class="fas fa-calendar-minus"></i>  إستلام  </button></td>';
    if($order->kitchen_status==1)
    $output .='<td class="ordermark"><span>جاري تنفيذ الطلب</span> </td>
    <td ><button class="btn  btn-danger" onclick="setstatsu(2,'.$order->order_id.')"><i class="fas fa-truck"></i>   تم الإنتهاء </button></td>';
    if($order->kitchen_status==2)
    $output .='<td class="ordermark"><span>تم إنهاء الطلب</span>  </td>';
    if($order->kitchen_status==3)
    $output .='<td class="ordermark"> <span>تم تسليم الطلب</span> </td>
    <td></td>';



    $output .='</tr>';
}*/