{form attrs=['method' => 'post', 'action' => '']}
	{form_label text='Login id' id='login_id'}
	{form_input field='login_id' value='' attrs=['autofocus']}
	{form_label text='Password' id='password'}
	{form_password field='password' value=''}
	{form_submit field='btn-submit' value='Submit'}
{/form}