<div class="container">
    <h2>Цифры и факты</h2>
    <div class="blocks">
        <div class="block">
            <div class="block_title">86 миллиардов</div>
            <div class="block_text">Число нейронов в мозге человека</div>
        </div>
        <div class="block">
            <div class="block_title">86 миллиардов</div>
            <div class="block_text">Число нейронов в мозге человека</div>
        </div>
        <div class="block">
            <div class="block_title">86 миллиардов</div>
            <div class="block_text">Число нейронов в мозге человека</div>
        </div>
        <div class="block">
            <div class="block_title">86 миллиардов</div>
            <div class="block_text">Число нейронов в мозге человека</div>
        </div>
        <div class="block">
            <div class="block_title">86 миллиардов</div>
            <div class="block_text">Число нейронов в мозге человека</div>
        </div>
        <div class="block">
            <div class="block_title">86 миллиардов</div>
            <div class="block_text">Число нейронов в мозге человека</div>
        </div>
        <div class="block">
            <div class="block_title">86 миллиардов</div>
            <div class="block_text">Число нейронов в мозге человека</div>
        </div>
        <div class="block">
            <div class="block_title">86 миллиардов</div>
            <div class="block_text">Число нейронов в мозге человека</div>
        </div>
    </div>
</div>

<table class=" operdata" style=" border=0; cellpadding=0; cellspacing=70;position: relativeж">
    <tr>

        @foreach($rts as $key => $value)
            <td style="width: 20px;">Oper {{$key}}</td>

            @foreach($value as $key1 => $valr)
                <td style="width: 150px;">@if ($loop->first) <i class="bi bi-arrow-left-square data-left" style="font-size: 15px"></i>
                    @elseif ($loop->last) <i class="bi bi-arrow-right-square data-right" style="font-size: 15px"></i> @endif{{$key1}} <input type="radio" name="operdata" value="{{Carbon\Carbon::parse($key)->format('Y-m-d')}}"></td>
            @endforeach
    </tr>

    @foreach($opersb as $k => $v)
        <tr>
            <td class="resource">{{$v->worktime_start}}</td>
            <?php  $doubl = 'g'; ?>
            @foreach($value as $key2 => $value2)


                @if(!empty($value2[$k]) and $value2[$k] != 'NULL')
                    @php  $pieces=''; $wor=''; @endphp
                    @php $pieces = explode("#", $value2[$k]); $w=27*($pieces[0]);  @endphp

             <td class="time" ><div >
                     {{$pieces[1]}} <br/>
                     <?php  $doubl = $pieces[1]; ?>
                        </div> </td>
                    <?php  $doubl = $pieces[1]; ?>

        @else
                    <td class="spliter"></td>

            @endif

            @endforeach
            </tr>

            @endforeach

            @endforeach
</table>

