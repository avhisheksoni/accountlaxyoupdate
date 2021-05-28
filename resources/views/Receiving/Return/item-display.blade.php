@php $receivingCart = session()->get('receivingCart'); @endphp
@if($receivingCart)

	@foreach($receivingCart as $data)
	<tr>		
		<td class="text-center">
			<input type="text" name="item_number[]" id="item_number_{{$data['item_number']}}" value="{{$data['item_number'] }}" class="form-control" readonly="true">
		</td>
		<td></td>
		<td class="text-center">
			<input type="text" name="name[]" value="{{ $data['name'] }}" class="form-control" readonly="">
			{{-- <div align="center"><p style="font-size: 12px">[ in stock : {{ $data['actual_qty'] - $data['qty'] }} ]</p></div> --}}
		</td>
		<td></td>
		<td class="text-center">
			{{-- <div align="center">{{ $data['actual_qty'] - $data['qty'] }}</div> --}}
			<input type="text" value="{{ $data['actual_qty'] - $data['qty'] }}" class="form-control" readonly="">
		</td>
		<td></td>
		<td class="text-center">
			<input type="number" name="qty[]" id="qty_{{$data['item_id']}}" data-id="{{$data['item_id']}}" value="{{ $data['qty']}}" class="form-control item_qty">
		</td>
		<td></td>
		<td class="text-center">
			<input type="text" name="name[]" value="{{ $data['unit_id'] }}" class="form-control" readonly="">
		</td>
		<td></td>
		<td class="text-center">
	      
	        <button type="button" class="btn btn-sm btn-danger removeCartItem" value="{{ $data['item_id'] }}" title="Delete">X</i></button>
	      
		</td>
	
	</tr>
@endforeach

@else
	<tr>
		<td colspan="10">
			<div class="alert alert-dismissible alert-info text-center">There are no items here.</div>
		</td>
	</tr>
@endif

