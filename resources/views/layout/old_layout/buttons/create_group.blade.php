@include('......forms._basic.default',
['model' => 'group','method' => 'store','type'=>'modal'])

 <tr>
 	<td>
     	{{-- <span class="minitext room_type">new item</span> --}}
     	<a class="link" type="button" data-toggle="modal" data-target="#group_store_modal">
     		<div class="profile_button">
     		    <span class="added_icon">
     		      <i class="fa fa-plus"></i>
     		    </span>
     		</div>
     	</a>
     </td>
     <td colspan="4"></td>
 </tr>