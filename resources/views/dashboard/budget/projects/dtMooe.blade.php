@if($data->mooe != null && $data->mooe != 0)
    <label class="no-margin">{{number_format($data->mooe,2)}}</label>
    <div class="table-subdetail text-left">
        <table style="width: 100%">
            <tr>
                <td>Bal:</td>
                <td class="text-right">
                    @php
                        $balance = $data->mooe - $data->orsAppliedProjects->sum('mooe');
                    @endphp
                    @if($data->mooe != $balance)
                        <span class="{{($balance <= 0) ? 'bg-red':'text-green'}}">{{\App\Swep\Helpers\Helper::toNumber($balance,2)}}</span>
                    @else
                        {{\App\Swep\Helpers\Helper::toNumber($balance,2)}}
                    @endif

                </td>
            </tr>
        </table>
    </div>
@else
    -
@endif