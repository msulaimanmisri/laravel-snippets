<?php

class HandleInertiaRequests extends Middleware
{
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth.user' => fn () => $request->user()
                ? $request->user()->only('id', 'name', 'email')
                : null,

            'user.role.admin' => fn () => $request->user()
            ? $request->user()->role('admin')
            : null,

            'user.role.student' => fn () => $request->user()
            ? $request->user()->role('student')
            : null,
        ]);
    }
}

// In Vue file
<NavLink v-if="$page.props.user.role.admin"
:href="route('page.admin')"
:active="route().current('page.admin)">
 Page for Admin
</NavLink>

<NavLink v-if="$page.props.user.role.student"
:href="route('page.student')"
:active="route().current('page.student)">
 Page for Student
</NavLink>
