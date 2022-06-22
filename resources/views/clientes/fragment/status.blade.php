@if($incident->status->name == 'Abierto')
<td class='bg-danger'>
{{$incident->status->name}}
</td>
@elseif($incident->status->name == 'En revision')
<td class='bg-warning'>
{{$incident->status->name}}
</td>
@elseif($incident->status->name == 'Cerrado')
<td class='bg-success'>
{{$incident->status->name}}
</td>
@endif