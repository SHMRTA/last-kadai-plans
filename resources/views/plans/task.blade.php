@extends('layouts.app')

@section('content')
<div class="container">
        <div class="jusify-content-center">
            <div class="row jusify-content-center">
            <div class="">
                
                    <table class="table table-striped" border="2">
                        <thead>
                            <tr>
                                {{--月曜日から日曜日までの日付を表示する--}}
                                {{-- コピーメソッドを用いて$dayへ代入している為、$mondayが比較として使える変数となる--}}
                                @for ($day = $monday->copy(); $day <= $sunday; $day->addDay(1))
                                
                                    {{--月曜日だけ5つのセル　そのほかの曜日は4つのセルにしたい--}}
                                    @if ($monday == $day)
                                        <th colspan="5">{{ $day ->format("Y年n月j日") }}</th>
                                    @else
                                        <th colspan="4">{{ $day ->format("Y年n月j日") }}</th>
                                    @endif
                                @endfor
                            </tr>
                                
                            <tr>
                                {{-- 各日にちの時間帯を4分割 --}}
                                @for($day = $monday->copy(); $day <= $sunday; $day->addDay(1))
                                    @if($monday == $day)
                                        <th></th>
                                    @endif    
                                        <th>AM1</th>
                                        <th>AM2</th>
                                        <th>PM1</th>
                                        <th>PM2</th>
                                @endfor
                            </tr>
                        </thead>
                                
                        <tbody>
                            {{--登録されたユーザの分表を表示する--}}
                            @foreach ($users as $user)
                        		<tr>
                        			<td>{{ $user->name }}</td>
                        			
                        			    {{--1週間を表示--}}
                        			    
                        			    
                        			    @for($day = $monday->copy(); $day <= $sunday; $day->addDay(1))
                                			
                                			@for($section = 1; $section <= 4;$section++)
                                			    @php
                                			        $f_date = date_format($day,'y-m-d');
                                                    
                                			        $plan=$user->getPlanForDay($f_date,$section);
                                			         //どんな値が入っているか検証→週初めの月曜日の日付が入っていた。
                                			        //dd($f_date);
                                			        
                                			    @endphp
                                			    
                                			    @if ($plan == null)
                                                    <td></td>
                                                @else
                                                    <td>{{ $plan->content }}</td>
                                                @endif
                                    		@endfor	
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

