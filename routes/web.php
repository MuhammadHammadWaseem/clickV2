<?php

use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\payCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\GiftSuggestion;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\WebPageController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\reminderController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\GuestListController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\TableSeatingController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\OperationController;

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

Route::get('/lang/{lang}', [WebController::class, 'lang'])->name('lang.switch');

Route::group(['as' => 'web.'], function () {
    Route::get('/', [WebController::class, 'index'])->name('index');
    Route::get('/events', [WebController::class, 'events'])->name('events');
    Route::get('/events/{id}', [WebController::class, 'getEvents'])->name('get.events');
    Route::get('/features', [WebController::class, 'features'])->name('features');
    Route::get('/about', [WebController::class, 'about'])->name('about');
    Route::get('/contact', [WebController::class, 'contact'])->name('contact');
    Route::get('/blog', [WebController::class, 'blog'])->name('blog');
    Route::get('/tutorial', [WebController::class, 'tutorial'])->name('tutorial');
    Route::get('/packages', [WebController::class, 'packages'])->name('packages');
    Route::get('/privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/terms-of-use', function () {
        return redirect('/privacy-policy');
    });


    Route::middleware('guest')->group(function () {
        Route::get('/register', [WebController::class, 'register']);
        Route::post('/register', [WebController::class, 'register_store']);
        Route::get('/login', [WebController::class, 'login'])->name('login');
        Route::post('/login', [WebController::class, 'login_success']);
        Route::get('/reset', [WebController::class, 'reset']);
        Route::post('/recoverp', [WebController::class, 'dorecover']);
        Route::get('/new-password/{code}', [WebController::class, 'newPassword']);
        Route::post('/changep', [WebController::class, 'changep']);
    });

    Route::get('/logout', [WebController::class, 'logout'])->name('logout');
    Route::get('/confirm/{code}', [WebController::class, 'confirm']);
    Route::get('/success', [WebController::class, 'success'])->name('success');

    // Blog routes
    Route::get('/blog', [WebController::class, 'blog'])->name('blog.index');
    Route::get('/blog/{slug}', [WebController::class, 'blogshow'])->name('blog.show');
    Route::get('/all/blog', [WebController::class, 'blogshowall'])->name('blog.all');
    Route::get('/blogs/search', [WebController::class, 'blogsearch'])->name('blogs.search');
    Route::match(['get', 'post'], '/sendcontact', [WebController::class, 'postcontact'])->name('sendcontact');
});

// <====================================== PANEL ======================================> \\
Route::group(['as' => 'panel.'], function () {
    Route::middleware([AuthCheck::class])->group(function () {
        Route::get('/panel', [PanelController::class, 'index'])->name('index');

        // EVENT
        Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
            Route::get('/{id}/general-infos', [PanelController::class, 'generalInfos'])->name('generalInfos');
            Route::post('/updateEvent/{id}', [PanelController::class, 'updateEvent'])->name('updateEvent');
            Route::delete('/delete/{id}', [PanelController::class, 'deleteEvent'])->name('delete');
            Route::post('store', [PanelController::class, 'store'])->name('store');

            Route::get('/{id}/webpage', [WebPageController::class, 'index'])->name('webpage');
            Route::post('/{id}/store/images', [WebPageController::class, 'storeImages'])->name('store.images');
            Route::post('/{id}/delete/images', [WebPageController::class, 'deleteImages'])->name('delete.images');
            Route::post('/{id}/store/cerimage', [WebPageController::class, 'storeCerImage'])->name('store.cerimage');
            Route::post('/{id}/store/recimage', [WebPageController::class, 'storeRecImage'])->name('store.recimage');
            Route::post('/{id}/store/parimage', [WebPageController::class, 'storeParImage'])->name('store.parimage');
            Route::post('/{id}/change-main-photo', [WebPageController::class, 'changeMainPhoto'])->name('changeMainPhoto');
            Route::post('/store/videos', [WebPageController::class, 'storeVideos'])->name('store.videos');
            Route::post('/delete/videos', [WebPageController::class, 'deleteVideo'])->name('delete.videos');

            // Photos
            Route::get('{id}/photos', [PhotoController::class, 'index'])->name('photos')->middleware('payCheck');

            // Meals Route
            Route::get('{id}/meals', [MealController::class, 'index'])->name('meals');
            Route::post('show/meals', [MealController::class, 'showMeals'])->name('meals.show');
            Route::post('/meals/store', [MealController::class, 'store'])->name('meals.store');
            Route::get('/meal/edit/{id}', [MealController::class, 'edit'])->name('meals.edit');
            Route::post('/meal/update/{id}', [MealController::class, 'update'])->name('meals.update');
            Route::delete('/meals/delete/{id}', [MealController::class, 'destroy'])->name('meals.destroy');

            Route::get('{id}/gift-suggestion', [GiftSuggestion::class, 'index'])->name('gift');

            // tutorial
            Route::get('{id}/tutorial', [TutorialController::class, 'index'])->name('tutorial');

            // Gift Suggestion
            Route::get('{id}/gift-suggestion/show', [GiftSuggestion::class, 'show'])->name('gift.show');
            Route::post('gift/gift-suggestion', [GiftSuggestion::class, 'store'])->name('gift.store');
            Route::get('gift/gift-suggestion/edit/{id}', [GiftSuggestion::class, 'edit'])->name('gift.edit');
            Route::post('gift/gift-suggestion/update/{id}', [GiftSuggestion::class, 'update'])->name('gift.update');
            Route::post('gift/gift-suggestion/savetransfer/{id}', [GiftSuggestion::class, 'savetransfer'])->name('savetransfer');
            Route::delete('gift/gift-suggestion/delete/{id}', [GiftSuggestion::class, 'destroy'])->name('gift.delete');

            // Guest
            Route::get('{id}/guests-list', [GuestListController::class, 'index'])->name('guests-list')->middleware('payCheck');
            Route::post('new-guest/{id}', [GuestListController::class, 'newguest'])->name('guests-list.store');
            Route::post('new-guest/show/{id}', [GuestListController::class, 'show'])->name('guests-list.show');
            Route::get('{id}/guests/edit', [GuestListController::class, 'edit'])->name('guests.edit');
            Route::post('{id}/guests/update', [GuestListController::class, 'update'])->name('guests.update');
            Route::get('{id}/guests/show-event', [GuestListController::class, 'allguests'])->name('guests.show-event');
            Route::post('{id}/guests/import', [GuestListController::class, 'importGuestFromOtherEvent'])->name('importGuestFromOtherEvent');
            Route::post('importfcsv/{id}', [GuestListController::class, 'importFromCsvGuest'])->name('importFromCsvGuest');
            Route::post('{id}/delete/guest', [GuestListController::class, 'deleteGuest'])->name('deleteGuest');
            Route::post('{id}/decline/guest', [GuestListController::class, 'declineguest'])->name('declineguest');
            Route::get('{id}/get-guests-qr/{date}', [GuestListController::class, 'getGuestqr'])->name('getGuestqr');
            Route::post('{id}/save-options', [GuestListController::class, 'saveOptions'])->name('saveOptions');
            Route::post('{id}/send-invitations', [GuestListController::class, 'sendinvitations'])->name('sendinvitations');
            // Guest End

            // reminder
            Route::get('{id}/reminder', [reminderController::class, 'index'])->name('reminder')->middleware('payCheck');
            Route::post('{id}/sendAckMail', [reminderController::class, 'sendAckMail'])->name('sendAckMail');
            Route::post('{id}/sendAcWhatsapp', [reminderController::class, 'sendAcWhatsapp'])->name('sendAcWhatsapp');
            Route::post('{id}/sendAcSms', [reminderController::class, 'sendAcSms'])->name('sendAcSms');
            Route::post('{id}/editsave', [reminderController::class, 'editsave'])->name('editsave');

            //message
            Route::get('{id}/message', [messageController::class, 'index'])->name('message')->middleware('payCheck');
            Route::post('{id}/editsaveMessage', [messageController::class, 'editsaveMessage'])->name('editsaveMessage');
            Route::post('{id}/sendSmsMail', [messageController::class, 'sendSmskMail'])->name('sendSmsMail');
            Route::post('{id}/sendSmsWhatsapp', [messageController::class, 'sendSmsWhatsapp'])->name('sendSmsWhatsapp');
            Route::post('{id}/sendSMSms', [messageController::class, 'sendSmSms'])->name('sendSmSms');



            // Table eating
            Route::get('{id}/guests-tables', [TableSeatingController::class, 'index'])->name('guests.index')->middleware('payCheck');
            Route::get('{id}/get-tables', [TableSeatingController::class, 'showTables'])->name('get.tables')->middleware('payCheck');
            Route::get('{id}/get-table-guest', [TableSeatingController::class, 'showTableGuest'])->name('get.table.guest')->middleware('payCheck');
            Route::get('{id}/get-table-data', [TableSeatingController::class, 'showTableData'])->name('get.table.data')->middleware('payCheck');
            Route::post('{id}/store-table', [TableSeatingController::class, 'storeTables'])->name('store.table')->middleware('payCheck');
            Route::post('{id}/edit-table', [TableSeatingController::class, 'editTable'])->name('edit.table')->middleware('payCheck');
            Route::post('{id}/delete-table', [TableSeatingController::class, 'deleteTable'])->name('delete.table')->middleware('payCheck');
            Route::post('set-tables', [TableSeatingController::class, 'setTable'])->name('set.table')->middleware('payCheck');
            Route::post('set-guest-seat', [TableSeatingController::class, 'settablesseat'])->name('settablesseat')->middleware('payCheck');
            Route::post('remove-guest', [TableSeatingController::class, 'removeGuest'])->name('removeGuest')->middleware('payCheck');
            Route::post('editplan', [TableSeatingController::class, 'editplan'])->name('editplan')->middleware('payCheck');

            //Invitation
            Route::get('{id}/invitation', [InvitationController::class, 'index'])->name('invitation');
            Route::post('{id}/invitation/setting/update', [InvitationController::class, 'settingUpdate'])->name('invitation.setting.update');
            Route::get('get-card/{event_id}', [InvitationController::class, 'getCard'])->name('getCard');
            Route::get('{id}/get-csrfToken', [InvitationController::class, 'csrfToken'])->name('invitation.getCsrftoken');

            // Pay
            Route::get('{id}/pay', [PayController::class, 'index'])->name('pay.index')->middleware('PaidUserCheck');
            Route::post('{id}/pay-datas', [PayController::class, 'paydatas'])->name('pay.get');
        });
    });
});
Route::get('website/{id}', [WebsiteController::class, 'index'])->name('website');
Route::post('website/edit/{id}', [WebsiteController::class, 'update'])->name('website.update');
Route::get('events/{id}/show-gallery', [WebsiteController::class, 'showGallery'])->name('showGallery');
Route::post('store/images/{id}', [WebPageController::class, 'storeUsersImages'])->name('store.users.images');
Route::get('/mail-acknowledgment/{idguest}/{idevent}', [reminderController::class, 'ackWebPage'])->name('ackWebPage');
Route::get('/mail-message/{idguest}/{idevent}', [messageController::class, 'message'])->name('mail.message');


Route::get('get-json', [InvitationController::class, 'getJson'])->name('get.jsone');
Route::get('get-json/back', [InvitationController::class, 'getJsonBack'])->name('get.jsone.back');
Route::get('get-templates/{id}', [InvitationController::class, 'getTemplates'])->name('get.template');
Route::post('/save-blob', [InvitationController::class, 'saveBlob'])->name('saveBlob');
Route::post('/save-blob/back', [InvitationController::class, 'saveBlobBack'])->name('saveBlobBack');
Route::get('/get-animations', [InvitationController::class, 'getAnimations'])->name('getAnimations');
Route::get('/cardPreviewNew/{id}', [InvitationController::class, 'cardPreviewNew'])->name('cardPreviewNew');
Route::get('get-csrf-token', [InvitationController::class, 'getCsrfToken'])->name('getCsrfToken');
Route::get('get-template/{id}', [InvitationController::class, 'getTemplateWithId'])->name('getTemplate');
Route::post('toggle-two-sided', [InvitationController::class, 'toggleTwoSided'])->name('toggleTwoSided');
Route::post('animation-save', [InvitationController::class, 'saveAnimation'])->name('saveAnimation');
Route::post('upload-stamp', [InvitationController::class, 'uploadStamp'])->name('uploadStamp');
Route::get('/print-table/{idevent}', [TableSeatingController::class, 'print'])->name('print');
Route::get('/cardInvitations/{id}/{guestCode}/{name}/{lang}', [TableSeatingController::class, 'cardInviteLangNameNew']);
Route::get('/cardinvitations/{id}/{guestCode}/{name}/{lang}', [TableSeatingController::class, 'cardInviteLangNameNew']);
Route::get('/attending/{cardId}/{guestcode}/{lang}', [OperationController::class, 'attending']);
Route::post('/opened-answered', [OperationController::class, 'openedanswered']);
Route::post('/show-event', [OperationController::class, 'showevent']);
Route::post('/my-members', [OperationController::class, 'mymembers']);
Route::post('/my-group', [OperationController::class, 'mygroup']);
Route::post('/show-meals', [OperationController::class, 'showmeals']);
Route::post('/get-table', [OperationController::class, 'getTables']);
Route::post('/edit-opguest', [OperationController::class, 'editopguest']);
Route::get('/get-guest', [OperationController::class, 'getGuest']);
Route::post('/GuestEdit/{id}', [OperationController::class, 'guestedit']);
Route::post('/guest-decline', [OperationController::class, 'GuestDecline']);
Route::post('/confirm-guest', [OperationController::class, 'confirmGuest']);
Route::post('/del-member-attending', [OperationController::class, 'delmemberattending']);
Route::get('/gift-suggestion/{cardId}/{guestcode}/{lang}', [OperationController::class, 'giftsuggestion']);
Route::post('/show-opgifts', [OperationController::class, 'showopgifts']);
Route::post('/pick-gift', [OperationController::class, 'pickgift']);
Route::get('/check-in/{cardId}/{guestcode}/{lang}', [OperationController::class, 'checkin']);
Route::post('/show-opguests', [OperationController::class, 'showopguests']);
Route::post('/change-check', [OperationController::class, 'changecheck']);
Route::get('/add-photos/{cardId}/{guestcode}/{lang}', [OperationController::class, 'addphotos']);
Route::post('/new-guest', [OperationController::class, 'newguest']);
Route::get('/sendInvite-whatsapp', [OperationController::class, 'sendWhatsapp']);
Route::get('/sendInvite-email', [OperationController::class, 'sendEmail']);
Route::get('/sendInvite-sms', [OperationController::class, 'sendSMS']);
Route::post('/save-images', [OperationController::class, 'saveimages']);
Route::get('/sorry-cant/{cardId}/{guestcode}/{lang}', [OperationController::class, 'sorrycant']);
Route::post('/decline', [OperationController::class, 'decline']);
Route::get('/CheckInQr/{cId}/{gCode}/{lang}', [OperationController::class, 'CheckInQr']);
Route::post('/send-meal-invitations', [OperationController::class, 'sendMealInvitations'])->name('sendMealInvite');
Route::post('/guestCanSelectSeats', [OperationController::class, 'guestCanSelectSeats']);
