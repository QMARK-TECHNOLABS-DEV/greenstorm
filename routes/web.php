<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
        ProfileController,
        WebAuthController,
        VerificationController,
        SubscriptionController,
        NotificationController,
        CertificateController,
        EmailVerificationController,
        admin\LoginController as AdminLoginController,
        Auth\ChangePasswordController as ChangePasswordController,
        admin\AdminController as AdminController,
        admin\UserController as UserController,
        admin\CompetitionController as CompetitionController,
        admin\DistributionController as DistributionController,
        admin\PhotoCategoryController as PhotoCategoryController,
        admin\CompetitionSettingsController as CompetitionSettingsController,
        admin\StageController as StageController,
        admin\VoteController as VoteController,

        evaluator\LoginController as EvaluatorLoginController,
        evaluator\EvaluatorController as EvaluatorController,
        evaluator\EliminationController as EliminationController,
        evaluator\ValidationController as ValidationController,
        evaluator\CompetitionController as EvaluatorCompetitionController,
        evaluator\CompetitionSettingsController as EvaluatorCompetitionSettingsController,
        evaluator\StageController as EvaluatorStageController,

        AuthController,
        WebController,
        ContactController,

        admin\PhotographController as PhotographController,
        admin\PhotographerController as PhotographerController,

        Auth\NewPasswordController,
        Auth\PasswordResetLinkController,
    };

    use Laravel\Socialite\Facades\Socialite;

    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/pre-login',[WebController::class, 'pre_login'])->name('pre.login');
Route::post('/process-pre-login',[WebAuthController::class, 'process_pre_login'])->name('process.pre.login');
// Route::middleware(['check_pre_login'])->group(function () {
    Route::get('/',[WebController::class, 'index'])->name('home');
    Route::get('/about-us',[WebController::class, 'about'])->name('about');
    Route::get('/contests',[WebController::class, 'contest'])->name('contest');
    // Route::get('/quintavious-maximilian-abernathy-thornton-voting',[WebController::class, 'voting'])->name('contest.voting');
    // Route::middleware(['check_pre_login'])->group(function () {
        Route::get('voting',[WebController::class, 'voting'])->name('contest.voting');
        Route::post('/pop-up-details',[WebController::class, 'popup_image_details'])->name('voting.popup.image');
    // });
    Route::get('/sign-up',[WebController::class, 'sign_up'])->name('signup');
    Route::get('/login',[WebController::class, 'log_in'])->name('login');

    Route::post('/register',[WebAuthController::class, 'register'])->name('user.register');
    Route::post('/process-login',[WebAuthController::class, 'process_login'])->name('user.process_login');
    Route::get('/contact-us',[WebController::class, 'contact'])->name('contact');

    Route::get('/awards',[WebController::class, 'awards'])->name('awards');
    Route::get('/press-release',[WebController::class, 'press_release'])->name('press.release');
    Route::get('/festivals',[WebController::class, 'festivals'])->name('festivals');
    Route::get('/about-greenstorm',[WebController::class, 'about_greenstorm'])->name('about.greenstorm');
    Route::get('/about-g20',[WebController::class, 'about_g20'])->name('about.g20');
    Route::get('/privacy-policy',[WebController::class, 'privacy_policy'])->name('privacy.policy');
    Route::get('/terms-and-conditions',[WebController::class, 'terms_and_conditions'])->name('terms.conditions');
    Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    
    //route created by joby-winners blade
     Route::get('/winners-2023/mobile',[WebController::class, 'getWinners'])->name('getWinners');
      Route::get('/winners-2023/camera',[WebController::class, 'getCamera'])->name('getCamera');
    
    // signup and login
    Route::get('/login',[WebController::class, 'log_in'])->name('login');
    Route::post('/process-login',[WebAuthController::class, 'process_login'])->name('user.process_login');
    Route::get('/sign-up',[WebController::class, 'sign_up'])->name('signup');
    Route::post('/register',[WebAuthController::class, 'register'])->name('user.register');
    // forgot password
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    // forgot password ends
    // social login starts
    Route::get('/login/google', [WebAuthController::class,'redirect_to_google'])->name('login.google');
    Route::get('/login/google/callback', [WebAuthController::class,'handle_google_callback']);
    Route::get('/login/windows', [WebAuthController::class,'windows_login'])->name('login.windows');
    Route::get('login/facebook', [WebAuthController::class,'redirectToFacebookProvider'])->name('login.facebook');
    Route::get('auth/facebook/callback',  [WebAuthController::class,'handleFacebookProviderCallback']);
    Route::get('/login/twitter',  [WebAuthController::class,'redirectToTwitter'])->name('login.twitter');
    Route::get('/login/twitter/callback', [WebAuthController::class,'handleTwitterCallback']);
    Route::get('/login/linkedin', [WebAuthController::class,'redirectToLinkedIn'])->name('login.linkedin');
    Route::get('/login/linkedin/callback', [WebAuthController::class,'handleLinkedInCallback']);
    Route::post('/contact', [ContactController::class,'store'])->name('contact.store');
    // social login ends
    // old
    // Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    // Route::post('/email/verify/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    // Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    // ->middleware(['signed', 'auth'])
    // ->name('verification.verify');
    //old email_verification ends
    Route::get('/email/verify', [EmailVerificationController::class, 'show'])->name('verification.send');
    Route::post('/email/verify/resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
    // Route::get('/email/verify', [EmailVerificationController::class, 'sendVerificationEmail'])->name('verification.send');
    Route::get('/email/verify/{token}', [EmailVerificationController::class, 'verifyEmail'])->name('verification.verify');
    Route::get('/verification/error', [EmailVerificationController::class, 'error'])->name('verification.error');



    Route::middleware(['auth:web','is_email_verified'])->group(function () {
        Route::get('/change-password', [ChangePasswordController::class,'showChangePasswordForm'])->name('password.change.form');
        Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password');
        Route::post('/voting-like-image',[WebController::class, 'votingLikeAction'])->name('voting.like.image');
        // Route::post('/voting-like-image',[WebController::class, 'votingLikeAction'])->name('voting.like.image')->middleware('check_pre_login');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update-profile', [ProfileController::class, 'update_profile'])->name('profile.update');
        Route::get('/profile/list-uploaded-photographs', [ProfileController::class, 'list_uploaded_photographs'])->name('list.uploaded.photographs');
        Route::get('/profile/notifications', [NotificationController::class, 'index'])->name('notification.index');
        Route::get('/profile/photo-competition-expired', [ProfileController::class, 'competition_expiry_notification'])->name('competitions.expired');
        Route::middleware(['check.competition'])->group(function () {
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/profile/upload-photograph', [ProfileController::class, 'upload_photograph'])->name('profile.photograph.upload');
            Route::post('/profile/process-upload-photograph', [ProfileController::class, 'process_upload_photograph'])->name('process.photograph.upload');
            Route::get('/generate-certificate', [CertificateController::class, 'generateCertificate'])->name('generate.certificate');
            Route::get('/mail-generate-certificate/{token}', [CertificateController::class, 'generateMailCertificate'])->name('mail.generate.certificate');
        });
        Route::get('/dashboard',  function () {
            return view('dashboard');
        })->middleware('verified')->name('dashboard');
    });
    Route::post('/logout', [WebAuthController::class, 'logout'])->name('web.logout');
// });
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/reset-password/{token}', [UserController::class, 'showPasswordForm'])->name('admin.reset.password');
    Route::post('/change-password', [UserController::class, 'resetPassword'])->name('admin.password.change');
    Route::middleware('auth:admin','prevent-back-history','image.cache')->group(function(){
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/photographs/{type?}', [PhotographController::class, 'index'])->name('admin.photographs');
        Route::get('/photographs/categories/{id?}', [PhotographController::class, 'category'])->name('admin.photographs.categories');
        Route::get('/photographers/{photographer?}/{type?}', [PhotographerController::class, 'index'])->name('admin.photographers');
        Route::get('/distribution', [DistributionController::class, 'index'])->name('admin.distribution');

        Route::post('/create-competition', [CompetitionController::class, 'create'])->name('create.competition');
        Route::get('/competitions', [CompetitionController::class, 'index'])->name('admin.competitions');
        Route::get('/competitions/{id}/categories', [CompetitionController::class, 'getCategories'])->name('competitions.categories');
        Route::get('/competition/{competition}/stages', [CompetitionController::class, 'manage_stages'])->name('competitions.manage.stages');
        Route::get('/competition/{competition}/stages/{stage}/edit', [CompetitionController::class, 'edit_stage'])->name('competitions.stages.edit');


        Route::post('/change-competitions-status', [CompetitionController::class, 'change_competitions_status'])->name('admin.change.competitions.status');
        Route::get('/competition-settings/{competition}', [CompetitionSettingsController::class, 'index'])->name('competition.manage.settings');
        Route::post('/competition-settings-ajax-action', [CompetitionSettingsController::class, 'ajax_page_action'])->name('competition.ajax.page.action');
        Route::post('/delete-competition-photos', [CompetitionSettingsController::class, 'delete_competition_photos'])->name('competition.delete.photos');
        Route::post('/get-popup-photos', [CompetitionSettingsController::class, 'get_popup_photos'])->name('competition.get.popup.photos');

        Route::get('/get-photos/pagination/{competition}', [CompetitionSettingsController::class, 'pagination'])->name('admin.competition.photos.pagination');
        Route::get('/get-photos/elimination/pagination/{competition}/stage/{stage}', [CompetitionSettingsController::class, 'elimination_pagination'])->name('admin.competition.photos.elimination.pagination');
        Route::match(['get', 'post'],'/competition/{competition}/elimination/{level?}/entries', [CompetitionSettingsController::class, 'elimination'])
        ->where(['competition' => '[0-9]+', 'level' => '[0-9]*'])
                        ->name('competition.elimination.entries');
        Route::match(['get','post'],'/competition/{competition}/elimination/{level?}/eliminated', [CompetitionSettingsController::class, 'eliminated'])
                        ->where(['competition' => '[0-9]+', 'level' => '[0-9]*'])
                        ->name('competition.elimination.eliminated');
        Route::match(['get','post'],'/competition/{competition}/elimination/{level?}/promoted', [CompetitionSettingsController::class, 'promoted'])
                        ->where(['competition' => '[0-9]+', 'level' => '[0-9]*'])
                        ->name('competition.elimination.promoted');
        Route::get('/competition/{competition}/deleted', [CompetitionSettingsController::class, 'deleted'])->name('competition.entries.deleted');

        Route::match(['get','post'],'/competition/{competition}/validation/{level?}/entries', [CompetitionSettingsController::class, 'validation'])
                        ->where(['competition' => '[0-9]+', 'level' => '[0-9]*'])
                        ->name('competition.validation.entries');

        Route::match(['get','post'],'/competition/{competition}/validation/index', [CompetitionSettingsController::class, 'validation_index'])
                        ->where(['competition' => '[0-9]+'])
                        ->name('competition.validation.entries.index');
        // Route::get('/competition/{competition}/validation/{level?}/validated', [CompetitionSettingsController::class, 'validated'])
        //                 ->where(['competition' => '[0-9]+', 'level' => '[0-9]*'])
        //                 ->name('competition.validation.validated');
        Route::get('/competition/{competition}/deleted', [CompetitionSettingsController::class, 'deleted'])
                        ->where(['competition' => '[0-9]+'])
                        ->name('competition.entries.deleted');

        Route::get('/competition/{competition}/stages', [StageController::class, 'stages'])
                                                        ->where(['competition' => '[0-9]+'])
                                                        ->name('competition.stages');

        Route::post('/popup-exapand-data/{photo}', [CompetitionController::class,'image_details'])->name('admin.popup_exapand_data');


        Route::post('/save-categories', [CompetitionController::class, 'saveCategories'])->name('save.categories');
        Route::get('/photo-categories', [PhotoCategoryController::class,'index'])->name('admin.photo.categories');
        Route::post('/photo-categories', [PhotoCategoryController::class,'store'])->name('admin.photo.categories.store');
        Route::get('/photo-categories/{id}', [PhotoCategoryController::class, 'show'])->name('admin.photo.categories.show');
        Route::put('/photo-categories/{id}', [PhotoCategoryController::class, 'update'])->name('admin.photo.categories.update');
        Route::resource('stages', StageController::class);
        Route::get('/load-stages/{competition}', [StageController::class,'get_stages'])->name('admin.get.stages');
        Route::post('/stage-levels/{competition}/{type}', [StageController::class,'stage_levels'])->name('admin.stage.levels');
        Route::post('/next-stage-label/{competition}', [StageController::class,'next_stage_label'])->name('admin.next.stage.label');
        Route::post('/stage-add-form/{competition}/{type}', [StageController::class, 'stage_add_form'])->name('admin.stage.add.form');
        Route::post('/send-to-vote', [StageController::class, 'send_to_vote'])->name('admin.send_to_vote');
        Route::post('/revert-vote-action', [StageController::class, 'revertVoteAaction'])->name('admin.revert_action');
        Route::post('/vote-action-content', [StageController::class, 'voteActionContent'])->name('admin.vote_action_content');
        Route::post('/category-select-for-winners', [StageController::class, 'categorySelectForWinner'])->name('admin.category_select_for_winner');
        Route::post('/publish-winner-action-content', [StageController::class, 'publishWinnerActionContent'])->name('admin.publish_winner_action_content');
        Route::post('/vote-web-publish', [StageController::class, 'votePublishToWebAction'])->name('admin.vote_publish_to_web');
                Route::post('/stop-public-voting', [StageController::class, 'stopPublicVotingAction'])->name('admin.stop_public_voting');

        Route::get('/competition/{competition}/vote', [VoteController::class, 'index'])
                                                        ->where(['competition' => '[0-9]+'])
                                                        ->name('competition.published_for_vote');

        // Route to update the category data
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::post('/submit-user-form', [UserController::class, 'submit_user_form'])->name('admin.users.create');


        Route::post('/change-user-status', [UserController::class, 'change_user_status'])->name('admin.change.user.status');
        Route::post('/view-user', [UserController::class, 'view_user'])->name('admin.view.user');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});
/*
|--------------------------------------------------------------------------
| Evaluator Routes
|--------------------------------------------------------------------------
*/
Route::prefix('evaluator')->group(function () {
    Route::get('/', [EvaluatorLoginController::class, 'index'])->name('evaluator.login');
    Route::post('/login', [EvaluatorLoginController::class, 'login'])->name('evaluator.login.submit');
    Route::middleware('auth:evaluator','prevent-back-history')->group(function(){
        Route::get('/dashboard', [EvaluatorController::class, 'index'])->name('evaluator.dashboard');
        Route::get('/elimination', [EliminationController::class, 'index'])->name('evaluator.elimination');
        Route::post('/eliminate-photos', [EliminationController::class, 'eliminate_photos'])->name('evaluator.eliminate.photos');
        Route::post('/promote-photos', [EliminationController::class, 'promote_photos'])->name('evaluator.promote.photos');
        Route::post('/revert-eliminated-photos', [EliminationController::class, 'revert_eliminated_photos'])->name('evaluator.revert.eliminated.photos');
        Route::get('/validation', [ValidationController::class, 'index'])->name('evaluator.validation');
        Route::get('/competitions/{id}/categories', [EvaluatorCompetitionController::class, 'getCategories'])->name('evaluator.competitions.categories');
        Route::get('/competitions', [EvaluatorCompetitionController::class, 'index'])->name('evaluator.competitions');
        Route::match(['get','post'], '/competition-settings/{competition}', [EvaluatorCompetitionSettingsController::class, 'index'])->name('evaluator.competition.manage.settings');

        Route::match(['get','post'], '/competition-settings/{competition}/stage/{stage}/eliminated', [EvaluatorCompetitionSettingsController::class, 'eliminated'])->name('evaluator.competition.stage.eliminated');
        Route::match(['get','post'], '/competition-settings/{competition}/stage/{stage}/promoted', [EvaluatorCompetitionSettingsController::class, 'promoted'])->name('evaluator.competition.stage.promoted');

        Route::post('/competition-settings-ajax-action', [EvaluatorCompetitionSettingsController::class, 'ajax_page_action'])->name('evaluator.competition.ajax.page.action');
        Route::post('/popup-exapand-data/{photo}', [EvaluatorCompetitionController::class,'image_details'])->name('evaluator.popup_exapand_data');
        Route::post('/popup-slide-data/{photo}', [EvaluatorCompetitionController::class,'image_slide_details'])->name('evaluator.popup_slide_data');
        Route::post('/assign-mark-for-photos', [EvaluatorCompetitionController::class,'assign_mark_photos'])->name('evaluator.assign.mark.photos');

        Route::get('/load-stages/{competition}', [EvaluatorStageController::class,'get_stages'])->name('evaluator.get.stages');
        Route::post('/stage-levels/{competition}/{type}', [EvaluatorStageController::class,'stage_levels'])->name('evaluator.stage.levels');
        Route::post('/logout', [EvaluatorController::class, 'logout'])->name('evaluator.logout');
    });
});
