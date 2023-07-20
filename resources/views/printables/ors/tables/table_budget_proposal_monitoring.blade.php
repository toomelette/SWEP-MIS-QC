<table style="width: 100%" class="tbl-padded tbl-bordered">
    <thead>
    <tr class="bg-warning">
        <th class="text-center" rowspan="2" style="width: 90px">PAP CODE</th>
        <th class="text-center" rowspan="2">PROGRAMS/ACTIVITIES/PROJECTS (PAPs)</th>
        <th class="text-center" colspan="3">PROPOSED BUDGETARY REQUIREMENT</th>
        <th class="text-center" rowspan="2">UTILIZATION</th>
        <th class="text-center" rowspan="2">BALANCE</th>
        <th class="text-center" rowspan="2">PRECENT SHARE</th>
    </tr>
    <tr class="bg-warning">
        <th class="text-center">CO</th>
        <th class="text-center">MOOE</th>
        <th class="text-center">TOTAL</th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($paps))
        @foreach($paps as $pap_code => $data)
            <tr>
                <td>{{$pap_code}}</td>
                <td>{{$data['pap']['pap_title']}}</td>
                <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($data['pap']['co'],2)}}</td>
                <td class="text-right">{{\App\Swep\Helpers\Helper::toNumber($data['pap']['mooe'],2)}}</td>
                <td class="text-right">{{ number_format($total = $data['pap']['co'] + $data['pap']['mooe'],2)  }}</td>
                <td class="text-right">{{ number_format($utilized = $data['utilized'],2) }}</td>
                <td class="text-right">{{ number_format($balance = $total - $utilized,2) }}</td>
                <td class="text-center">
                    {{number_format($balance = \App\Swep\Helpers\Helper::divide(100 * $utilized,$total),3)}}
                </td>
            </tr>
        @endforeach
        @php
            $collection = collect($paps);
        @endphp
        <tr class="text-strong bg-success">
            <td></td>
            <td>TOTAL</td>
            <td class="text-right">{{number_format( $totalCo = $collection->sum('pap.co'),2)}}</td>
            <td class="text-right">{{number_format($totalMooe = $collection->sum('pap.mooe'),2)}}</td>
            <td class="text-right">{{number_format($totalBudget = $totalCo + $totalMooe,2)}}</td>
            <td class="text-right">{{number_format($totalUtilized = $collection->sum('utilized'),2)}}</td>
            <td class="text-right">{{number_format($totalBalance = $totalBudget - $totalUtilized,2)}}</td>
            <td class="text-center">
                {{number_format($totalBalance = \App\Swep\Helpers\Helper::divide(100 * $totalUtilized,$totalBudget),3)}}
            </td>
        </tr>
    @endif
    </tbody>
</table>