


public function getSignIn() {
	return View::make('account.signin');
}



public function postSignIn() {
	$validator = Validator::make(Input::all()
	array(
			'email' => 'required|email',
			'password' => 'required'
		)
	),
	if($validator->fails()){
		return Redirect::route('account-sign-in')
				->withErrors($validator)
				->withInput();
	} else{
		$auth = Auth::attempt(array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'active' => 1
		));

		if($auth) {
			//redirects to the intended page
			return Redirect::intended('/');

		} else {
			return Redirect::route('account-sign-in')
					->with('global', 'Email/password wrong, or account not activated.')
		}
	}
}