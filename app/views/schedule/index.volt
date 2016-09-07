{{ content() }}

<h2>Your Schedule</h2>
{{ link_to('schedule/add', 'Add new schedule', 'class': 'btn btn-primary') }}

{% for schedule in schedules %}
{% if loop.first %}
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>Schedule ID</td>
            <td>Address start</td>
            <td>Address end</td>
            <td>Action</td>
        </tr>
    </thead>
{% endif %}

    <tbody>
        <tr>
            <td>{{ schedule.id }}</td>
            <td>
            {% for address_start in schedule.address_start %}

            {{ address_start }}

            {% endfor %}
            </td>
            <td>{{ schedule.address_end }}</td>
            <td><span class="label label-success">Success</span></td>
        </tr>
    </tbody>

{% if loop.last %}
</table>
{% endif %}

{% else %}
    No schedule are recorded
{% endfor %}