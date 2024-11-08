<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\RegisterViewResponseAction;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\FortifyServiceProvider;

class FortifyProvider extends FortifyServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(RegisterViewResponse::class, RegisterViewResponseAction::class);
        // تخصيص كيفية إنشاء المستخدمين الجدد
        // Fortify::createUsersUsing(CreateNewUser::class);

        // تخصيص كيفية تحديث المعلومات الشخصية للمستخدمين
        // Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);

        // تخصيص كيفية تحديث كلمات مرور المستخدمين
        // Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);

        // تخصيص كيفية إعادة تعيين كلمات المرور للمستخدمين
        // Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // تخصيص صفحة التسجيل
        // Fortify::registerView(function () {
        //     return view('auth.register'); // هنا يمكنك تخصيص مسار العرض كما تراه مناسبًا
        // });

        // تحديد القيود الخاصة بالتسجيل
        // RateLimiter::for('login', function (Request $request) {
        //     $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

        //     return Limit::perMinute(5)->by($throttleKey);
        // });

        // تحديد القيود الخاصة بالمصادقة الثنائية
        // RateLimiter::for('two-factor', function (Request $request) {
        //     return Limit::perMinute(5)->by($request->session()->get('login.id'));
        // });
    }
}
