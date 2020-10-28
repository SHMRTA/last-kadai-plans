@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row jusify-content-center">
            <div class="">
                
                    <table class="table table-striped">
                        <tbody>
                    		<tr>
                    			<th colspan="5" >10月28日</th>
                    		</tr>
                    		<tr>
                    			<td><!-- 時間帯とユーザ名が重ならないようにする --></td>
                    			<td>午前1</td>
                    			<td>午前2</td>
                    			<td>午後1</td>
                    			<td>午後2</td>
                    		</tr>
                    		
                    		@foreach ($users as $users)
                        		<tr>
                        			<td>{{$users->name}}</td>
                        			<td></td>
                        			<td></td>
                        			<td></td>
                        			<td></td>
                        		</tr>
                    		@endforeach
                    		
                    	</tbody>
                    </table>
                </div>
            
        </div>
    </div>
@endsection