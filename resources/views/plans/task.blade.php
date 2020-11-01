@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="table-responsive">
                <table class="table table-striped" border="2">
                    <thead>
                        <tr>
                            {{--月曜日から日曜日までの日付を表示する--}}
                            {{-- コピーメソッドを用いて$dayへ代入している為、$mondayが比較として使える変数となる--}}
                            @for ($day = $monday->copy(); $day <= $sunday; $day->addDay(1))
                                
                                {{--月曜日だけ5つのセル　そのほかの曜日は4つのセルにする--}}
                                @if ($monday == $day)
                                    <th colspan="5" class="text-center">{{ $day ->format("Y年n月j日") }}</th>
                                @else
                                    <th colspan="4" class="text-center">{{ $day ->format("Y年n月j日") }}</th>
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
                        {{--登録されたユーザの分列を表示する--}}
                        @foreach ($users as $user)
                        	<tr>
                        		<td class="text-center">{{ $user->name }}</td>
                        			{{--↓1週間分の各ユーザのセルを表示--}}
                        			    @for($day = $monday->copy(); $day <= $sunday; $day->addDay(1))
                        			    
                        			       {{-- $sectionの値は4までの設定（4パターンの区分けの為）--}}
                                			@for($section = 1; $section <= 4;$section++)
                                                @php
                                                    //dd($user->getPlanForDay($day,$section));
                                                @endphp
                                                
                                			    {{--1日中の予定があるかどうか？--}}
                                			    @if($section == 1 && $user->isTherePlanForDay($day,7))
                                			        <td colspan="4" bgcolor="#FF99FF">{{ $user->getPlanForDay($day,7)->content }}</td>
                                			        @php
                                			            $section = $section + 3;
                                			        @endphp
                                			        
                                			     {{--午前中の判定--}}
                                			     @elseif ($section == 1 && $user->isTherePlanForDay($day,5))    
                                			         <td colspan="2" bgcolor="#9933FF">{{ $user->getPlanForDay($day,5)->content }}</td>
                                			         
                                			     @php
                                			         $section = $section + 1;
                                			     @endphp
                                			     
                                			     {{--午後中の判定--}}
                                			     @elseif ($section == 3 && $user->isTherePlanForDay($day,6)) 
                                			         
                                			         <td colspan="2" bgcolor="#9ACD32">{{ $user->getPlanForDay($day,6)->content }}</td>
                                			     @php
                                			         $section = $section + 1;
                                			     @endphp
                                			     
                                			     {{--午前2区分・午後2区分で分けた時の判定--}}
                                			     @elseif ($user->isTherePlanForDay($day,$section) )
                                			         <td bgcolor="#00FF66">{{ $user->getPlanForDay($day,$section)->content }}</td>
                                			     @else
                                			         <td></td>
                                			    @endif
                                		    @endfor	
                                    	@endfor	
                        		</tr>
                    		@endforeach
                        </tbody>
                </table>
            </div>
    </div>
    {!! link_to_route('plan.create', '予定作成', [], ['class' => 'btn btn-lg btn-primary']) !!}
@endsection

