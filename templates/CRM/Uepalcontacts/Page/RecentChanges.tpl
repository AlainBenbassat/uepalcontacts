<table class="report">
  <tr class="columnheader">
    <th>Contact modifié</th>
    <th>Modifié le</th>
    <th>Par</th>
    <th>Type d'action</th>
  </tr>
  {foreach from=$recentChanges item=row}
    <tr>
      <td><a href="{crmURL p='civicrm/contact/view' q="reset=1&cid=`$row.modified_contact_id`"}">{$row.modified_contact}</a></td>
      <td>{$row.modification_date}</td>
      <td>{$row.modified_by}</td>
      <td>{$row.log_action}</td>
    </tr>
  {/foreach}
</table>
