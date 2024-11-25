@props(['url'])
<tr>
    <td class="header">
        <a href="https://health.gov.tt/" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <p>Procurement Contracts</p>
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
