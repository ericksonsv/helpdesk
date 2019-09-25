<h3>Companies</h3>
<pre>
<section id="company-seeder">
@foreach ($companies as $company)
[
	"id" => {{$company->id}},
	"name" => "{{$company->name}}",
	"slug" => "{{$company->slug}}",
	"logo" => "{{$company->logo}}",
	"banner" => "{{$company->banner}}",
	"address"	=> "{{$company->address}}",
	"phone"	=> "{{$company->phone}}",
	"site" => "{{$company->site}}",
	"email" => "{{$company->email}}",
	"facebook" => "{{$company->facebook}}",
	"twitter" => "{{$company->twitter}}",
	"instagram" => "{{$company->instagram}}",
	"youtube" => "{{$company->youtube}}",
	"created_at" => "{{$company->created_at}}",
	"updated_at" => "{{$company->updated_at}}",
],
@endforeach
</section>
</pre>

<h3>Departments</h3>
<pre>
<section id="department-seeder">
@foreach ($departments as $department)
[
	"id" => {{$department->id}},
	"company_id" => {{$department->company_id}},
	"name" => "{{$department->name}}",
	"slug" => "{{$department->slug}}",
	"created_at" => "{{$department->created_at}}",
	"updated_at" => "{{$department->updated_at}}",
],
@endforeach
</section>
</pre>

<h3>Employees</h3>
<pre>
<section id="employee-seeder">
@foreach ($employees as $employee)
[
	'id' => {{$employee->id}},
	'company_id' => {{$employee->company_id}},
	'department_id' => {{$employee->department_id}},
	'first_name' => '{{$employee->first_name}}',
	'last_name' => '{{$employee->last_name}}',
	'birthday' => '{{$employee->birthday}}',
	'since' => '{{$employee->since}}',
	'avatar' => '{{$employee->avatar}}',
	'email' => '{{$employee->email}}',
	'position' => '{{$employee->position}}',
	'extension' => '{{$employee->extension}}',
	'mobile' => '{{$employee->mobile}}',
	'skype' => '{{$employee->skype}}',
	'sort_order' => '{{$employee->sort_order}}',
	'status' => '{{$employee->status}}',
	'created_at' => '{{$employee->created_at}}',
	'updated_at' => '{{$employee->updated_at}}',
],
@endforeach
</section>
</pre>