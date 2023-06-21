@if($data->co != null && $data->co != 0)
    <label class="no-margin">{{number_format($data->co,2)}}</label>
    <div class="table-subdetail text-left">
        <table style="width: 100%">
            <tr>
                <td>Bal:</td>
                <td class="text-right">
                    @php
                        $balance = $data->co - $data->orsAppliedProjects->sum('co');
                    @endphp
                    @if($data->co != $balance)
                        <span class="text-green">{{\App\Swep\Helpers\Helper::toNumber($balance,2)}}</span>
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