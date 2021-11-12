<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

         <!-- Laravelバリデーションのエラー表示 -->
         @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
             </ul>
         </div>
        @endif

        <form method="POST" action="{{route('nomember_account_create')}}">
            @csrf


            <input type="hidden" name="count" value="{{$count}}">
            <input type="hidden" name="reservation_id" value="{{$reservation_id}}">
            <div>
                <x-jet-label for="family_name" value="名字" />
                <x-jet-input id="family_name" class="block mt-1 w-full" type="text" name="family_name" required autofocus />
            </div><br>

            <div>
                <x-jet-label for="first_name" value="名前" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="メールアドレス" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div><br>

            <div>
                <x-jet-label for="company_name" value="会社名" />
                <x-jet-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="name" />
            </div><br>

            <div>
                <x-jet-label for="sales_office" value="営業所名" />
                <x-jet-input id="sales_office" class="block mt-1 w-full" type="text" name="sales_office" />
            </div><br>

            <div>
                <x-jet-label for="phone" value="電話番号" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" required autofocus />
            </div><br>

            <div class="container">
                <div class="row">
                  <div class="col text-center">
                    <button class="btn btn-default"　type="submit">予約確認画面へ</button>
                  </div>
                </div>
              </div>

            {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif --}}

            {{-- <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div> --}}
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
