@extends('layouts.app')

@section('content')
<div class="container">
        <div class="jusify-content-center">
            <!-- <div class="row jusify-content-center"> -->
            <div class="">
                
                    <table class="table table-striped">
                        <tbody>
                            
                            		
                                @while ( $day < $week )
                            		<tr>
                            			<th colspan="5" >{{ $day ->format("Y年n月j日") }}</th>
                            		</tr>
                            	
                            	
                            
                            		<tr>
                            			<td><!-- 時間帯とユーザ名が重ならないようにする --></td>
                            			<td>午前1</td>
                            			<td>午前2</td>
                            			<td>午後1</td>
                            			<td>午後2</td>
                            		</tr>
                        		
                        		     @php
                        		        $day->addDays(1) 
                                     @endphp  
                        		     
                        		@endwhile
                        	
                    		
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