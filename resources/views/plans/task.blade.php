@extends('layouts.app')

@section('content')
<div class="container">
        <div class="jusify-content-center">
            <!-- <div class="row jusify-content-center"> -->
            <div class="">
                
                    <table class="table table-striped" border="2">
                        <thead>
                            <tr>
                                {{--月曜日から日曜日までの日付を表示する--}}
                                
                                @for ($day = $monday->copy(); $day <= $sunday; $day->addDay(1))
                                    {{--月曜日だけ5つのセル　そのほかの曜日は4つのセルにしたい--}}
                                    @php
                                        $f_week = Carbon\Carbon::now()->startOfWeek(); 
                                        
                                    @endphp
                                    
                                    @if ($monday == $day)
                                        <th colspan="5">{{ $day ->format("Y年n月j日") }}</th>
                                    @else
                                        <th colspan="4">{{ $day ->format("Y年n月j日") }}</th>
                                    @endif
                                @endfor
                            </tr>
                                
                            <tr>
                                @php
                                //$u = \Auth::user->name();
                                //logger($u);
                                   
                                @endphp
                                
                                @for($day = $monday->copy(); $day <= $sunday; $day->addDay(1))
                                    @if($monday == $day)
                                        <th></th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                    @else
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                    @endif
                                @endfor
                            </tr>
                        </thead>
                                
                        <tbody>
                            @foreach ($users as $users)
                        		<tr>
                        			<td>{{$users->name}}</td>
                        			@for($day = $monday->copy(); $day <= $sunday; $day->addDay(1))
                            			<td bgcolor="red">予定1</td>
                            			<td></td>
                            			<td></td>
                            			<td></td>
                            		@endfor	
                        		</tr>
                    		@endforeach
                        </tbody>
                    </table>
                    
                    {!! link_to_route('plan.create', '予定作成', [], ['class' => 'btn btn-lg btn-primary']) !!}
                    
            </div>
        </div>
    </div>
@endsection