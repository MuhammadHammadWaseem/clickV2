@extends('Panel.layout.master')
<style>
    .font-color-styling input#favcolor1 {
    padding: 0 !important;
    width: 200px;
    height: 50px;
    border: 0;
    background: transparent;
    margin-bottom: 10px;
    border-radius: 10px;
}

.font-color-styling h4 {
    color: #7A7A7A;
    font-size: 15px;
    margin-bottom: 10px;
    font-weight: 600;
    margin-top: 0px;
}

input#minRange {
    width: 100%;
    margin-bottom: 15px;
}
.upload-container {
    text-align: center;
    display: flex;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    height: 100%;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    row-gap: 20px;
}

        .upload-container img {
            width: 100px; /* Adjust the size of the image */
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
        }

        .upload-container span {
            display: block;
            font-size: 14px;
            color: #333;
            margin-top: 10px;
        }

        /* Hide the actual file input */
        #uploadImage2 {
            display: none;
        }
        


</style>
@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $currentEventId = GeneralHelper::getEventId();
    @endphp
    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="edit-cards-boxes">
                    <div class="box-styling gift-suggestions">
                        <div class="text">
                            <h2>Edit Invitation Card</h2>
                            <p>ALorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <div class="card-styling-box">
                        <a href="#" type="button" data-toggle="modal" data-target="#exampleModalCenter02">
                            <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.5007 26.6667C24.1773 26.6667 27.1673 23.6767 27.1673 20C27.1673 16.3233 24.1773 13.3333 20.5007 13.3333C16.824 13.3333 13.834 16.3233 13.834 20C13.834 23.6767 16.824 26.6667 20.5007 26.6667ZM20.5007 16.6667C22.3073 16.6667 23.834 18.1933 23.834 20C23.834 21.8067 22.3073 23.3333 20.5007 23.3333C18.694 23.3333 17.1673 21.8067 17.1673 20C17.1673 18.1933 18.694 16.6667 20.5007 16.6667Z"
                                    fill="#C09D2A" />
                                <path
                                    d="M5.2413 26.8933L6.90797 29.7767C7.79297 31.305 9.92297 31.8783 11.458 30.9933L12.3396 30.4833C13.3039 31.2418 14.367 31.8654 15.4996 32.3367V33.3333C15.4996 35.1717 16.9946 36.6667 18.833 36.6667H22.1663C24.0046 36.6667 25.4996 35.1717 25.4996 33.3333V32.3367C26.6319 31.8653 27.6949 31.2424 28.6596 30.485L29.5413 30.995C31.0796 31.8783 33.2046 31.3083 34.093 29.7767L35.758 26.895C36.1997 26.1295 36.3195 25.22 36.091 24.3662C35.8626 23.5125 35.3046 22.7843 34.5396 22.3417L33.698 21.855C33.8769 20.6259 33.8769 19.3774 33.698 18.1483L34.5396 17.6617C35.3043 17.2187 35.8619 16.4906 36.0903 15.6369C36.3187 14.7833 36.1992 13.8739 35.758 13.1083L34.093 10.2267C33.208 8.69334 31.0796 8.11834 29.5413 9.00668L28.6596 9.51668C27.6954 8.75819 26.6323 8.13467 25.4996 7.66334V6.66668C25.4996 4.82834 24.0046 3.33334 22.1663 3.33334H18.833C16.9946 3.33334 15.4996 4.82834 15.4996 6.66668V7.66334C14.3674 8.13474 13.3043 8.75765 12.3396 9.51501L11.458 9.00501C9.91797 8.12001 7.7913 8.69334 6.9063 10.225L5.2413 13.1067C4.79961 13.8722 4.67982 14.7817 4.90826 15.6354C5.1367 16.4892 5.69468 17.2174 6.45964 17.66L7.3013 18.1467C7.12169 19.3751 7.12169 20.6232 7.3013 21.8517L6.45964 22.3383C5.69491 22.7816 5.13719 23.5101 4.90879 24.364C4.6804 25.2179 4.79998 26.1275 5.2413 26.8933ZM10.7846 22.2967C10.5964 21.5456 10.5007 20.7743 10.4996 20C10.4996 19.23 10.5963 18.4567 10.783 17.7033C10.8709 17.3522 10.842 16.982 10.7006 16.6488C10.5593 16.3156 10.3132 16.0375 9.99964 15.8567L8.12797 14.7733L9.7913 11.8917L11.6996 12.995C12.0108 13.1751 12.3721 13.2494 12.7291 13.2067C13.0861 13.164 13.4196 13.0067 13.6796 12.7583C14.8072 11.6859 16.1669 10.888 17.653 10.4267C17.9943 10.3225 18.2932 10.1114 18.5057 9.82456C18.7181 9.53772 18.8328 9.19027 18.833 8.83334V6.66668H22.1663V8.83334C22.1665 9.19027 22.2812 9.53772 22.4936 9.82456C22.706 10.1114 23.0049 10.3225 23.3463 10.4267C24.8321 10.8887 26.1917 11.6865 27.3196 12.7583C27.5799 13.0062 27.9134 13.1632 28.2703 13.2059C28.6272 13.2485 28.9883 13.1746 29.2996 12.995L31.2063 11.8933L32.873 14.775L30.9996 15.8567C30.6863 16.0377 30.4404 16.3158 30.299 16.649C30.1577 16.9821 30.1287 17.3522 30.2163 17.7033C30.403 18.4567 30.4996 19.23 30.4996 20C30.4996 20.7683 30.403 21.5417 30.2146 22.2967C30.1272 22.648 30.1565 23.0182 30.2981 23.3514C30.4397 23.6846 30.686 23.9626 30.9996 24.1433L32.8713 25.225L31.208 28.1067L29.2996 27.005C28.9885 26.8247 28.6272 26.7502 28.2701 26.7929C27.9131 26.8356 27.5795 26.9931 27.3196 27.2417C26.1921 28.3141 24.8324 29.112 23.3463 29.5733C23.0049 29.6776 22.706 29.8886 22.4936 30.1755C22.2812 30.4623 22.1665 30.8097 22.1663 31.1667L22.1696 33.3333H18.833V31.1667C18.8328 30.8097 18.7181 30.4623 18.5057 30.1755C18.2932 29.8886 17.9943 29.6776 17.653 29.5733C16.1671 29.1113 14.8076 28.3135 13.6796 27.2417C13.4201 26.9924 13.0864 26.8345 12.729 26.7921C12.3717 26.7497 12.0103 26.825 11.6996 27.0067L9.79297 28.11L8.1263 25.2283L9.99964 24.1433C10.3133 23.9626 10.5596 23.6846 10.7012 23.3514C10.8428 23.0182 10.8721 22.648 10.7846 22.2967Z"
                                    fill="#C09D2A" />
                            </svg>
                            Settings
                        </a>
                    </div>

                    <div class="card-styling-box">
                        <a href="#">
                            <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.83333 8.33333H17.1667V5H5.5V16.6667H8.83333V8.33333ZM17.1667 31.6667H8.83333V23.3333H5.5V35H17.1667V31.6667ZM35.5 23.3333H32.1667V31.6667H23.8333V35H35.5V23.3333ZM32.1667 16.6667H35.5V5H23.8333V8.33333H32.1667V16.6667Z"
                                    fill="#C09D2A" />
                            </svg>
                            Preview
                        </a>
                    </div>

                    <div class="card-styling-box">
                        <a href="#" id="undoBtn">
                            <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.4993 16.6667H25.4993C28.256 16.6667 30.4993 18.91 30.4993 21.6667C30.4993 24.4233 28.256 26.6667 25.4993 26.6667H20.4993V30H25.4993C30.0943 30 33.8327 26.2617 33.8327 21.6667C33.8327 17.0717 30.0943 13.3333 25.4993 13.3333H15.4993V8.33334L7.16602 15L15.4993 21.6667V16.6667Z"
                                    fill="#C09D2A" />
                            </svg>
                            Undo
                        </a>
                    </div>


                    <div class="card-styling-box">
                        <a href="#" id="redoBtn">
                            <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.4993 30H20.4993V26.6667H15.4993C12.7427 26.6667 10.4993 24.4233 10.4993 21.6667C10.4993 18.91 12.7427 16.6667 15.4993 16.6667H25.4993V21.6667L33.8327 15L25.4993 8.33334V13.3333H15.4993C10.9043 13.3333 7.16602 17.0717 7.16602 21.6667C7.16602 26.2617 10.9043 30 15.4993 30Z"
                                    fill="#C09D2A" />
                            </svg>
                            Redo
                        </a>
                    </div>

                    <div class="card-styling-box">
                        <a href="#">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M33.9232 4.01311H13.9232C12.0848 4.01311 10.5898 5.50811 10.5898 7.34644V27.3464C10.5898 29.1848 12.0848 30.6798 13.9232 30.6798H33.9232C35.7615 30.6798 37.2565 29.1848 37.2565 27.3464V7.34644C37.2565 5.50811 35.7615 4.01311 33.9232 4.01311ZM13.9232 27.3464V7.34644H33.9232L33.9265 27.3464H13.9232Z"
                                    fill="#C09D2A" />
                                <path
                                    d="M7.25716 14.0131H3.92383V34.0131C3.92383 35.8514 5.41883 37.3464 7.25716 37.3464H27.2572V34.0131H7.25716V14.0131ZM25.5905 10.6798H22.2572V15.6798H17.2572V19.0131H22.2572V24.0131H25.5905V19.0131H30.5905V15.6798H25.5905V10.6798Z"
                                    fill="#C09D2A" />
                            </svg>
                            Add Card
                        </a>
                    </div>

                    <div class="card-styling-box">
                        <a href="#">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M30.7747 29.0131C32.6131 29.0131 34.1081 27.5181 34.1081 25.6798V9.01313C34.1081 7.17479 32.6131 5.67979 30.7747 5.67979H10.7747C8.93641 5.67979 7.44141 7.17479 7.44141 9.01313V25.6798C7.44141 27.5181 8.93641 29.0131 10.7747 29.0131H30.7747ZM10.7747 9.01313H30.7747L30.7781 25.6798H10.7747V9.01313ZM7.44141 32.3465H34.1081V35.6798H7.44141V32.3465Z"
                                    fill="#C09D2A" />
                            </svg>
                            Template
                        </a>
                    </div>

                    <div class="card-styling-box">
                        <a href="#">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.29688 14.0131H12.6302V10.6798H18.0502L13.7635 30.6798H9.29688V34.0131H22.6302V30.6798H18.8769L23.1635 10.6798H29.2969V14.0131H32.6302V7.34647H9.29688V14.0131Z"
                                    fill="#C09D2A" />
                            </svg>
                            AddText
                        </a>
                    </div>

                    <div class="card-styling-box">
                        <a href="#">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M36.4777 17.3165C34.8994 9.60812 28.0327 4.01312 20.151 4.01312C10.961 4.01312 3.48438 11.4898 3.48438 20.6798C3.48438 28.5615 9.07938 35.4281 16.7877 37.0065C17.0577 37.0638 17.3378 37.0523 17.6023 36.9731C17.8667 36.8939 18.107 36.7495 18.301 36.5531L36.0227 18.8315C36.4194 18.4348 36.5894 17.8681 36.4777 17.3165ZM18.4844 30.6798C18.4767 28.0237 19.2695 25.427 20.7594 23.2281C21.2395 22.5195 21.7852 21.8577 22.3894 21.2515C22.9949 20.6482 23.6555 20.1031 24.3627 19.6231C25.0774 19.142 25.8364 18.7301 26.6294 18.3931C27.431 18.0548 28.2727 17.7931 29.131 17.6165C30.3211 17.3801 31.5376 17.3049 32.7477 17.3931L18.5327 31.6081C18.511 31.2998 18.4844 30.9915 18.4844 30.6798ZM6.81771 20.6798C6.81771 13.3281 12.7994 7.34646 20.151 7.34646C24.9994 7.34646 29.3644 9.99479 31.6994 14.0215C30.6117 14.0254 29.5271 14.1359 28.461 14.3515C27.3894 14.5715 26.3377 14.8981 25.3294 15.3231C24.3387 15.7446 23.3905 16.2597 22.4977 16.8615C21.6094 17.4631 20.781 18.1465 20.0327 18.8948C19.2844 19.6431 18.6027 20.4698 17.9977 21.3615C17.3994 22.2498 16.881 23.2015 16.461 24.1915C15.5955 26.2451 15.1501 28.4512 15.151 30.6798C15.151 31.4981 15.231 32.3115 15.3494 33.1148C10.2994 31.1598 6.81771 26.2398 6.81771 20.6798Z"
                                    fill="#C09D2A" />
                            </svg>
                            Add Sticker
                        </a>
                    </div>

                    <div class="card-styling-box">
                        {{-- <a href="#">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.0013 9.01313H28.668V20.6798H32.0013V9.01313C32.0013 7.17479 30.5063 5.67979 28.668 5.67979H7.0013C5.16297 5.67979 3.66797 7.17479 3.66797 9.01313V29.0131C3.66797 30.8515 5.16297 32.3465 7.0013 32.3465H20.3346V29.0131H7.0013V9.01313Z"
                                    fill="#C09D2A" />
                                    <path
                                    d="M13.668 19.0131L8.66797 25.6798H27.0013L20.3346 15.6798L15.3346 22.3465L13.668 19.0131Z"
                                    fill="#C09D2A" />
                                    <path
                                    d="M32.0013 24.0131H28.668V29.0131H23.668V32.3465H28.668V37.3465H32.0013V32.3465H37.0013V29.0131H32.0013V24.0131Z"
                                    fill="#C09D2A" />
                                </svg>
                                Add Image
                                <input type="file" id="uploadImage2" onchange="uploadImageInCanvas(event)" accept="image/*">
                        </a> --}}

                        <a href="#">
                        <div class="upload-container" onclick="document.getElementById('uploadImage2').click()">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.0013 9.01313H28.668V20.6798H32.0013V9.01313C32.0013 7.17479 30.5063 5.67979 28.668 5.67979H7.0013C5.16297 5.67979 3.66797 7.17479 3.66797 9.01313V29.0131C3.66797 30.8515 5.16297 32.3465 7.0013 32.3465H20.3346V29.0131H7.0013V9.01313Z"
                                    fill="#C09D2A" />
                                    <path
                                    d="M13.668 19.0131L8.66797 25.6798H27.0013L20.3346 15.6798L15.3346 22.3465L13.668 19.0131Z"
                                    fill="#C09D2A" />
                                    <path
                                    d="M32.0013 24.0131H28.668V29.0131H23.668V32.3465H28.668V37.3465H32.0013V32.3465H37.0013V29.0131H32.0013V24.0131Z"
                                    fill="#C09D2A" />
                                </svg>
                            Add Image
                        </div>
                        </a>
                        
                        <!-- Hidden file input -->
                        <input type="file" id="uploadImage2" onchange="uploadImageInCanvas(event)" accept="image/*">
                        
                    </div>


                    <div class="card-styling-box">
                        <a href="#">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M33.8535 4.01312H17.1868C15.3485 4.01312 13.8535 5.50812 13.8535 7.34646V14.0131H7.18685C5.34852 14.0131 3.85352 15.5081 3.85352 17.3465V34.0131C3.85352 35.8515 5.34852 37.3465 7.18685 37.3465H23.8535C25.6918 37.3465 27.1868 35.8515 27.1868 34.0131V27.3465H33.8535C35.6918 27.3465 37.1868 25.8515 37.1868 24.0131V7.34646C37.1868 5.50812 35.6918 4.01312 33.8535 4.01312ZM7.18685 34.0131V17.3465H23.8535L23.8568 34.0131H7.18685ZM33.8535 24.0131H27.1868V17.3465C27.1868 15.5081 25.6918 14.0131 23.8535 14.0131H17.1868V7.34646H33.8535V24.0131Z"
                                    fill="#C09D2A" />
                            </svg>
                            Duplicate
                        </a>
                    </div>

                    <div class="card-styling-box">
                        <a href="#">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.553 4.50144C23.3983 4.34653 23.2146 4.22363 23.0125 4.13978C22.8103 4.05593 22.5935 4.01277 22.3746 4.01277C22.1557 4.01277 21.939 4.05593 21.7368 4.13978C21.5346 4.22363 21.3509 4.34653 21.1963 4.50144L11.463 14.2348C11.438 14.2331 11.4146 14.2198 11.3896 14.2198C11.1707 14.2195 10.954 14.2626 10.7517 14.3464C10.5495 14.4302 10.3659 14.5531 10.2113 14.7081L7.85464 17.0648C7.3893 17.5285 7.02041 18.0797 6.76925 18.6868C6.51809 19.2938 6.38964 19.9445 6.3913 20.6014C6.3913 21.9381 6.91297 23.1948 7.8563 24.1364L9.03463 25.3148L5.49797 28.8514C5.03153 29.3095 4.66216 29.8568 4.41189 30.4607C4.16162 31.0646 4.03558 31.7127 4.0413 32.3664C4.03343 33.0988 4.18828 33.8237 4.49466 34.489C4.80104 35.1542 5.25131 35.7431 5.81297 36.2131C6.67797 36.9448 7.79297 37.3464 8.95463 37.3464C10.3446 37.3464 11.7113 36.7781 12.7046 35.7848L16.1046 32.3864L17.283 33.5631C19.173 35.4514 22.4646 35.4531 24.353 33.5648L26.7113 31.2081C26.8663 31.0535 26.9892 30.8699 27.073 30.6677C27.1568 30.4654 27.1999 30.2487 27.1996 30.0298C27.1996 29.9864 27.178 29.9464 27.1746 29.9031L36.8863 20.1914C37.0412 20.0368 37.1641 19.8531 37.248 19.6509C37.3318 19.4487 37.375 19.232 37.375 19.0131C37.375 18.7942 37.3318 18.5775 37.248 18.3753C37.1641 18.1731 37.0412 17.9894 36.8863 17.8348L23.553 4.50144ZM21.9946 31.2081C21.6771 31.5113 21.255 31.6803 20.816 31.68C20.377 31.6797 19.955 31.51 19.638 31.2064L17.2813 28.8514C17.1267 28.6965 16.943 28.5736 16.7408 28.4898C16.5386 28.4059 16.3219 28.3628 16.103 28.3628C15.8841 28.3628 15.6673 28.4059 15.4651 28.4898C15.263 28.5736 15.0793 28.6965 14.9246 28.8514L10.348 33.4264C9.97919 33.7983 9.47832 34.0092 8.95463 34.0131C8.59391 34.019 8.2429 33.8961 7.96464 33.6664C7.77365 33.5084 7.62124 33.3088 7.519 33.083C7.41676 32.8571 7.36739 32.6109 7.37463 32.3631C7.37289 32.1486 7.41434 31.9359 7.49652 31.7378C7.5787 31.5397 7.69992 31.3601 7.85297 31.2098L12.568 26.4948C12.7229 26.3401 12.8458 26.1565 12.9296 25.9543C13.0135 25.7521 13.0566 25.5353 13.0566 25.3164C13.0566 25.0976 13.0135 24.8808 12.9296 24.6786C12.8458 24.4764 12.7229 24.2928 12.568 24.1381L10.2096 21.7798C10.0546 21.6257 9.93177 21.4423 9.84822 21.2403C9.76468 21.0383 9.7221 20.8217 9.72297 20.6031C9.72297 20.1564 9.8963 19.7381 10.2113 19.4231L11.3896 18.2448L23.1746 30.0314L21.9946 31.2081ZM25.143 27.2214L14.1663 16.2448L22.3746 8.03644L33.3513 19.0131L25.143 27.2214Z"
                                    fill="#C09D2A" />
                            </svg>
                            Clear Card
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="two-outside-boxes">
                    <div class="main-card-box">
                        <div class="main-img-box" id="canv">
                            {{-- <img src="{{ asset('assets/Panel/images/main-card-img.png') }}" alt=""> --}}
                            <canvas id="canvas">Your browser doesn't support canvas</canvas>
                        </div>
                    </div>
                    <div class="main-card-detaling-box">
                        <div class="editing-options-box">

                            <div class="two-thing-align">
                                <h3>Editing Options</h3>
                                <div class="hide-and-show-box">
                                    <div class="input-check-box">
                                        <input type="checkbox" id="two-sided-card" name="two-sided-card"
                                            value="Two Sided Card" onclick="toggleButtons()">
                                        <label for="two-sided-card"> Two Sided Card</label>
                                    </div>
                                    <div class="two-btn-align" style="display: none;">
                                        <input type="radio" name="edit" class="btn btn-primary t-btn" id="front" checked>Front
                                        <input type="radio" name="edit" class="btn btn-primary t-btn" id="back">Back
                                    </div>
                                </div>
                            </div>

                            <form action="">
                                <div class="input-box">
                                    <label for="">Enter Text</label>
                                    <input type="text" placeholder="Text">
                                </div>
                                <div class="input-box">
                                    <label for="font-styling">Font Styling</label>
                                    <select id="font-selector2" onchange="changeFontStyle(this)" class="fontSelector1">
                                        <option value="arial" style="font-family: arial">Arial</option>
                                        <option value="Cinzel, serif" style="font-family: 'Cinzel', serif">Cinzel</option>
                                        <option value="Sackers, sans-serif" style="font-family: 'Sackers', sans-serif">Sackers Gothic
                                        </option>
                                        <option value="Rama, sans-serif" style="font-family: 'Rama', sans-serif">Rama Gothic</option>
                                        <option value="CircularSpotify, sans-serif" style="font-family: 'CircularSpotify', sans-serif">
                                            CircularSpotify</option>
                                        <option value="Anta, sans-serif" style="font-family: Anta;">Anta</option>
                                        <option value="calig, Arial, sans-serif" style="font-family: 'calig', Arial, sans-serif;">calig
                                        </option>
                                        <option value="BLOODY, sans-serif" style="font-family: 'BLOODY', sans-serif;">BLOODY</option>
                                        <option value="alsscrp, sans-serif" style="font-family: 'alsscrp', sans-serif;">alsscrp</option>
                                        <option value="Raleway-Thin, sans-serif" style="font-family: 'Raleway-Thin', sans-serif;">
                                            Raleway Regular</option>
                                        <option value="Baskervville-Regular, sans-serif"
                                            style="font-family: 'Baskervville-Regular', sans-serif;">Baskervville-Regular</option>
                                        <!-- <option value="GreatVibes-Regular, sans-serif" style="font-family: 'GreatVibes-Regular', sans-serif;">GreatVibes-Regular</option> -->
                                        <option value="califr, sans-serif" style="font-family: 'califr', sans-serif;">Califr</option>
                                        <option value="califrragular, sans-serif" style="font-family: 'califrragular', sans-serif;">
                                            Califr Regular</option>
                                        <option value="MiltonOneBold, sans-serif" style="font-family: 'MiltonOneBold', sans-serif;">
                                            MiltonOneBold</option>
                                        <option value="CinzelDecorativeBold, sans-serif"
                                            style="font-family: 'CinzelDecorativeBold', sans-serif;">Cinzel Decorative Bold</option>
                                        <option value="CinzelDecorativeRegular, sans-serif"
                                            style="font-family: 'CinzelDecorativeRegular', sans-serif;">Cinzel Decorative Regular
                                        </option>
                                        <option value="Agraham, sans-serif" style="font-family: 'Agraham', sans-serif;">Agraham</option>
                                        <option value="GloriousCopperDEMO, sans-serif" style="font-family: 'GloriousCopperDEMO', sans-serif;">GloriousCopperDEMO</option>
                                        <option value="MettaDahlia, sans-serif" style="font-family: 'MettaDahlia', sans-serif;">
                                            MettaDahlia</option>
                                        <option value="Darleston" style="font-family: 'Darleston';">Darleston</option>
                                        <option value="GoogleMonsieurLaDoulaiseRegular"
                                            style="font-family:GoogleMonsieurLaDoulaiseRegular">
                                            GoogleMonsieurLaDoulaiseRegular</option>
                                        <option value="DistantStroke, sans-serif" style="font-family: 'DistantStroke', sans-serif;">
                                            Distant_Stroke</option>
                                        <option value="Vanity-Light, sans-serif" style="font-family: 'Vanity-Light', sans-serif;">
                                            Vanity-Light</option>
                                        <option value="Amoun, sans-serif" style="font-family: 'Amoun', sans-serif;">Amoun</option>
                                        <option value="Moonflowers, sans-serif" style="font-family: 'Moonflowers', sans-serif;">
                                            Moonflowers</option>
                                        <option value="ScarlettBusiat, sans-serif" style="font-family: 'ScarlettBusiat', sans-serif;">
                                            ScarlettBusiat</option>
                                        <option value="MontserratLight, sans-serif" style="font-family: 'MontserratLight', sans-serif;">
                                            Montserrat Light</option>
                                        <option value="BrockScript, sans-serif" style="font-family: 'BrockScript', sans-serif;">
                                            BrockScript</option>
                
                
                                        <option value="jandacelebrationscript, sans-serif"
                                            style="font-family: 'jandacelebrationscript', sans-serif;">Janda Celebration Script</option>
                                        <option value="anydore, sans-serif" style="font-family: 'anydore', sans-serif;">Anydore</option>
                                        <option value="creattiondemo, sans-serif" style="font-family: 'creattiondemo', sans-serif;">
                                            Creattion Demo</option>
                                        <option value="candy, sans-serif" style="font-family: 'candy', sans-serif;">Candy</option>
                                        <option value="weddingBells, sans-serif" style="font-family: 'weddingBells', sans-serif;">
                                            Wedding bells</option>
                                        <option value="Blacksword, sans-serif" style="font-family: 'Blacksword', sans-serif;">Blacksword
                                        </option>
                                        <option value="GabyDemo, sans-serif" style="font-family: 'GabyDemo', sans-serif;">Gaby Demo
                                        </option>
                                        <option value="arbuckle-fat, sans-serif" style="font-family: 'arbuckle-fat', sans-serif;">
                                            Arbuckle Fat</option>
                                        <option value="drSugiyamaRegular, sans-serif"
                                            style="font-family: 'drSugiyamaRegular', sans-serif;">Dr Sugiyama Regular</option>
                                        <option value="CasablancaNoirPersonalUse, sans-serif"
                                            style="font-family: 'CasablancaNoirPersonalUse', sans-serif;">Casablanca Noir Personal Use
                                        </option>
                                        <option value="RegistaItalic, sans-serif" style="font-family: 'RegistaItalic', sans-serif;">
                                            Regista Italic</option>
                                        <option value="CoalhandLueTRIAL, sans-serif"
                                            style="font-family: 'CoalhandLueTRIAL', sans-serif;">Coalhand Lue</option>
                                        <option value="MagentaRose, sans-serif" style="font-family: 'MagentaRose', sans-serif;">Magenta
                                            Rose</option>
                                        <option value="Vonique92_D, sans-serif" style="font-family: 'Vonique92_D', sans-serif;">
                                            Vonique92_D</option>
                                        <option value="VanityBoldNarrow, sans-serif"
                                            style="font-family: 'VanityBoldNarrow', sans-serif;">VanityBoldNarrow</option>
                                        <option value="KugileDemo, sans-serif" style="font-family: 'KugileDemo', sans-serif;">KugileDemo
                                        </option>
                                        <option value="LovelyCoffee, sans-serif" style="font-family: 'LovelyCoffee', sans-serif;">lovely
                                            Coffe</option>
                                        <option value="GreatVibesRegular, sans-serif"
                                            style="font-family: 'GreatVibesRegular', sans-serif;">GreatVibes Regular</option>
                                        <option value="Atheniademo, sans-serif" style="font-family: 'Atheniademo', sans-serif;">
                                            Atheniademo</option>
                
                                        <option value="Evilof, sans-serif" style="font-family: 'Evilof', sans-serif;">Evilof</option>
                                        <option value="Landliebe, sans-serif" style="font-family: 'Landliebe', sans-serif;">Landliebe
                                        </option>
                                        <option value="GREENFUZ, sans-serif" style="font-family: 'GREENFUZ', sans-serif;">GREENFUZ
                                        </option>
                                        <option value="Headhunter-Regular, sans-serif"
                                            style="font-family: 'Headhunter-Regular', sans-serif;">Headhunter Regular</option>
                                        <option value="victoria, sans-serif" style="font-family: 'victoria', sans-serif;">victoria
                                        </option>
                                        <option value="Rock Salt, cursive" style="font-family: 'Rock Salt', cursive;">Rock Salt</option>
                                        <option value="playball, cursive" style="font-family: 'Playball', cursive;">Playball</option>
                                        <option value="Rammetto One, sans-serif" style="font-family: 'Rammetto One', sans-serif;">
                                            Playball</option>
                                        <option value="Bungee Shade, sans-serif" style="font-family: 'Bungee Shade', sans-serif;">Bungee
                                            Shade</option>
                                        <option value="HenryMorganHand, sans-serif" style="font-family: 'HenryMorganHand', sans-serif;">
                                            Henry MorganHand</option>
                                        <option value="romeo, sans-serif" style="font-family: 'romeo', sans-serif;">Romeo</option>
                                        <option value="XTRAFLEX, sans-serif" style="font-family: 'XTRAFLEX', sans-serif;">XTRAFLEX
                                        </option>
                                        <option value="DancingScript-Regular, sans-serif"
                                            style="font-family: 'DancingScript-Regular', sans-serif;">DancingScript Regular</option>
                                        <option value="MountainsofChristmas, sans-serif"
                                            style="font-family: 'MountainsofChristmas', sans-serif;">Mountains of Christmas</option>
                                        <option value="Kingthings_Foundation, sans-serif"
                                            style="font-family: 'Kingthings_Foundation', sans-serif;">Kingthings_Foundation</option>
                                        <option value="Royalacid_o, sans-serif" style="font-family: 'Royalacid_o', sans-serif;">
                                            Royalacid_o</option>
                                        <option value="Royalacid, sans-serif" style="font-family: 'Royalacid', sans-serif;">Royalacid
                                        </option>
                                        <option value="OrotundCaps, sans-serif" style="font-family: 'OrotundCaps', sans-serif;">
                                            OrotundCaps</option>
                                        <option value="qurve, sans-serif" style="font-family: 'qurve', sans-serif;">qurve</option>
                                        <option value="dephun2, sans-serif" style="font-family: 'dephun2', sans-serif;">dephun2</option>
                                        <option value="mysteron, sans-serif" style="font-family: 'mysteron', sans-serif;">mysteron
                                        </option>
                                        <option value="LETSEAT, sans-serif" style="font-family: 'LETSEAT', sans-serif;">LETSEAT</option>
                                        <option value="energydimension, sans-serif" style="font-family: 'energydimension', sans-serif;">
                                            Energy Dimension</option>
                                        <!-- <option value="Popups, sans-serif" style="font-family: 'Popups', sans-serif;">Popups</option> -->
                                        <option value="dipedthick, sans-serif" style="font-family: 'dipedthick', sans-serif;">dipedthick
                                        </option>
                
                                        <option value="EB Garamond, serif" style="font-family: EB Garamond, serif">EB Garamond</option>
                                        <option value="Courier New, monospace" style="font-family: Courier New, monospace">Courier New
                                        </option>
                                        <option value="Lobster, sans-serif" style="font-family: Lobster;">Lobster</option>
                                        <option value="Lucida Console, monospace" style="font-family: Lucida Console, monospace">Lucida
                                            Console</option>
                                        <option value="Montserrat, sans-serif" style="font-family: Montserrat, sans-serif">Montserrat
                                        </option>
                                        <option value="Pacifico, cursive" style="font-family: Pacifico, cursive">Pacifico</option>
                                        <option value="PT Sans, sans-serif" style="font-family: PT Sans, sans-serif">PT Sans</option>
                                        <option value="Quicksand, sans-serif" style="font-family: Quicksand, sans-serif">Quicksand
                                        </option>
                                        <option value="Roboto, sans-serif" style="font-family: Roboto, sans-serif">Roboto</option>
                                        <option value="Source Code Pro, monospace" style="font-family: Source Code Pro, monospace">
                                            Source Code Pro</option>
                                        <option value="Ubuntu, sans-serif" style="font-family: Ubuntu, sans-serif">Ubuntu</option>
                                    </select>
                                </div>
                                <div class="text-styling-things">
                                    <ul>
                                        <li><a href="#"><svg width="30" height="30" viewBox="0 0 30 30"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M21.3263 14.025C22.0824 13.0525 22.4951 11.8569 22.5 10.625C22.5 7.52375 19.9762 5 16.875 5H7.5V23.75H17.5C20.6012 23.75 23.125 21.2262 23.125 18.125C23.1233 17.3546 22.9627 16.5929 22.6532 15.8874C22.3437 15.1819 21.892 14.5479 21.3263 14.025ZM16.875 8.75C17.9088 8.75 18.75 9.59125 18.75 10.625C18.75 11.6588 17.9088 12.5 16.875 12.5H11.25V8.75H16.875ZM17.5 20H11.25V16.25H17.5C18.5338 16.25 19.375 17.0912 19.375 18.125C19.375 19.1588 18.5338 20 17.5 20Z"
                                                        fill="#4A4A4A" />
                                                </svg>
                                            </a></li>
                                        <li><a href="#"><svg width="30" height="30" viewBox="0 0 30 30"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M23.75 8.75V5H11.25V8.75H14.835L11.265 21.25H6.25V25H18.75V21.25H15.165L18.735 8.75H23.75Z"
                                                        fill="#4A4A4A" />
                                                </svg>
                                            </a></li>
                                        <li><a href="#"><svg width="30" height="30" viewBox="0 0 30 30"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.44774 10.9475L6.68024 9.18C5.66737 10.1937 4.88278 11.4122 4.37899 12.7538L6.72024 13.63C7.09868 12.6231 7.68762 11.7086 8.44774 10.9475ZM23.7502 16.2487C23.7543 14.9352 23.4973 13.6339 22.9943 12.4205C22.4914 11.207 21.7524 10.1055 20.8202 9.18C19.2542 7.60603 17.2043 6.60443 15.0002 6.33625V2.5L8.75024 7.5L15.0002 12.5V8.86125C16.5363 9.11492 17.9538 9.84469 19.0527 10.9475C19.7517 11.642 20.3058 12.4682 20.683 13.3785C21.0602 14.2887 21.253 15.2647 21.2502 16.25V16.2525C21.2502 16.665 21.209 17.0713 21.1427 17.4738C21.134 17.5275 21.129 17.5837 21.119 17.6375C20.8971 18.7902 20.4101 19.8755 19.6965 20.8075C19.4965 21.0687 19.2827 21.3225 19.0515 21.5538C18.7691 21.833 18.4648 22.0893 18.1415 22.32C17.2938 22.9406 16.3235 23.3732 15.2952 23.5888C15.1177 23.6263 14.939 23.6513 14.7577 23.675C14.6802 23.6863 14.6052 23.7012 14.5277 23.7087C13.735 23.79 12.9345 23.7465 12.1552 23.58L11.6252 26.0238C12.6655 26.2468 13.7345 26.3041 14.7927 26.1937C14.879 26.185 14.9652 26.1675 15.0515 26.1562C15.3077 26.1237 15.5627 26.0862 15.814 26.0337L15.8802 26.0225L15.879 26.0162C16.8125 25.8162 17.7119 25.4814 18.549 25.0225L18.5502 25.0237L18.5852 25C19.0269 24.7535 19.449 24.4736 19.8477 24.1625C20.1852 23.9012 20.5127 23.625 20.819 23.3188C21.129 23.01 21.4065 22.6775 21.6702 22.3375C21.6965 22.3025 21.7315 22.2712 21.7577 22.2362L21.7502 22.2312C22.3238 21.4695 22.784 20.6287 23.1165 19.735L23.1265 19.7388C23.1627 19.6413 23.189 19.5412 23.2215 19.4425C23.2677 19.305 23.3152 19.1662 23.3552 19.0262C23.4052 18.8512 23.4465 18.675 23.4865 18.4975C23.514 18.3738 23.5465 18.2538 23.569 18.1288C23.609 17.915 23.639 17.6988 23.664 17.4838C23.6765 17.3888 23.6927 17.2963 23.7015 17.2C23.7302 16.8888 23.7477 16.575 23.7477 16.2587C23.7502 16.2562 23.7502 16.2537 23.7502 16.2487ZM7.74649 20.7463L5.74649 22.2475C6.60663 23.3927 7.70148 24.3409 8.95774 25.0288L10.159 22.8362C9.21457 22.3202 8.39189 21.6075 7.74649 20.7463ZM6.25024 16.25C6.25024 16.0688 6.25649 15.8913 6.26899 15.7138L3.77649 15.535C3.6719 16.9671 3.87785 18.4049 4.38024 19.75L6.72149 18.8737C6.40833 18.0345 6.24871 17.1458 6.25024 16.25Z"
                                                        fill="#4A4A4A" />
                                                </svg>
                                            </a></li>
                                        <li><a href="#"><svg width="30" height="30" viewBox="0 0 30 30"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.25 26.25H26.25V3.75H3.75V26.25H11.25ZM23.75 21.25V23.75H16.25V16.25H23.75V21.25ZM18.75 6.25H23.75V13.75H16.25V6.25H18.75ZM6.25 8.75V6.25H13.75V13.75H6.25V8.75ZM6.25 23.75V16.25H13.75V23.75H6.25Z"
                                                        fill="#4A4A4A" />
                                                </svg>
                                            </a></li>
                                        <li><a href="#"><svg width="30" height="30" viewBox="0 0 30 30"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.5 3.75H6.25C4.87125 3.75 3.75 4.87125 3.75 6.25V17.5C3.75 18.8787 4.87125 20 6.25 20H10V23.75C10 25.1287 11.1213 26.25 12.5 26.25H23.75C25.1287 26.25 26.25 25.1287 26.25 23.75V12.5C26.25 11.1213 25.1287 10 23.75 10H20V6.25C20 4.87125 18.8787 3.75 17.5 3.75ZM6.25 6.25H17.5L17.4963 17.5H6.25V6.25Z"
                                                        fill="#4A4A4A" />
                                                </svg>
                                            </a></li>
                                        <li><a href="#"><svg width="30" height="30" viewBox="0 0 30 30"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.25 20H10V23.75C10 25.1287 11.1213 26.25 12.5 26.25H23.75C25.1287 26.25 26.25 25.1287 26.25 23.75V12.5C26.25 11.1213 25.1287 10 23.75 10H20V6.25C20 4.87125 18.8787 3.75 17.5 3.75H6.25C4.87125 3.75 3.75 4.87125 3.75 6.25V17.5C3.75 18.8787 4.87125 20 6.25 20ZM23.7463 23.75H12.5V12.5H23.75L23.7463 23.75Z"
                                                        fill="#4A4A4A" />
                                                </svg>
                                            </a></li>
                                        <li><a href="#" id="deleteBtn"><svg width="30" height="30" viewBox="0 0 30 30"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.25 25C6.25 25.663 6.51339 26.2989 6.98223 26.7678C7.45107 27.2366 8.08696 27.5 8.75 27.5H21.25C21.913 27.5 22.5489 27.2366 23.0178 26.7678C23.4866 26.2989 23.75 25.663 23.75 25V10H26.25V7.5H21.25V5C21.25 4.33696 20.9866 3.70107 20.5178 3.23223C20.0489 2.76339 19.413 2.5 18.75 2.5H11.25C10.587 2.5 9.95107 2.76339 9.48223 3.23223C9.01339 3.70107 8.75 4.33696 8.75 5V7.5H3.75V10H6.25V25ZM11.25 5H18.75V7.5H11.25V5ZM10 10H21.25V25H8.75V10H10Z"
                                                        fill="#4A4A4A" />
                                                    <path
                                                        d="M11.25 12.5H13.75V22.5H11.25V12.5ZM16.25 12.5H18.75V22.5H16.25V12.5Z"
                                                        fill="#4A4A4A" />
                                                </svg>
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="font-size-styling">
                                    <h4>Font Size</h4>
                                    <ul>
                                        <li><a href="#"><svg width="30" height="30" viewBox="0 0 30 30"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M23.75 13.75H16.25V6.25H13.75V13.75H6.25V16.25H13.75V23.75H16.25V16.25H23.75V13.75Z"
                                                        fill="#F1F1F1" />
                                                </svg>
                                            </a></li>
                                        <li><a href="#"><svg width="30" height="30" viewBox="0 0 30 30"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.25 13.75H23.75V16.25H6.25V13.75Z" fill="#F1F1F1" />
                                                </svg>
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="font-color-styling">
                                    <h4>Font Size</h4>
                                    <input type="color" id="favcolor1" name="favcolor1" value="#050505">
                                    <h4>Background Color</h4>
                                    <input type="color" id="favcolor1" name="favcolor1" value="#ffffff">
                                </div>

                                <div class="other-editing">
                                    <h4>Opacity</h4>
                                    <div class="slider-container">
                                        <div class="range-slider">
                                            <input type="range" id="minRange" min="0" max="100" value="25" step="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="other-editing">
                                    <h4>Other Editing</h4>
                                    <ul>
                                        <li><a href="#">Flip Text</a></li>
                                        <li><a href="#">Text Transform</a></li>
                                        <li><a href="#">Letter Spacing</a></li>
                                        <li><a href="#">Line Height</a></li>
                                        <li><a href="#">Text Shadow</a></li>
                                    </ul>
                                </div>
                            </form>
                            <button type="button" class="btn btn-primary t-btn" data-toggle="modal"
                                data-target="#exampleModalCenter03"> Save Invitation Card </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>




    <!-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal"  data-target="#exampleModalCenter"> Would You To Have A Registry List </button> -->
    <div class="modal fade modal-01 add-new-meal" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>Would You To Have A Registry List</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I Don’t</button>
                    <button type="submit" class="submit-btn" data-dismiss="modal">Yes, I Do</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter03" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt="">
                        <h2>Invitation Card Updated Successfully</h2>
                        <p>Your gift suggestion has been successfully added.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- <button  class="btn btn-primary t-btn" type="button" data-toggle="modal"  data-target="#exampleModalCenter02"> Want To Send Invitations To Guests? </button> -->
    <!-- Modal -->
    <div class="modal fade modal-01 modal-02 settings-modal" id="exampleModalCenter02" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>Settings</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <form>
                        <div class="two-inline-inputes">
                            <div class="box">
                                <label>Invitation Message Title</label>
                                <input type="text" placeholder="We Are Going To Marriage.">
                            </div>
                            <div class="box">
                                <label for="font-styling">Guest Name’s Font Style</label>
                                <select name="font-styling" id="font-styling">
                                    <option value="font-styling">Font Styling</option>
                                    <option value="font-styling-01">Font Styling-01</option>
                                    <option value="font-styling-02">Font Styling-02</option>
                                    <option value="font-styling-03">Font Styling-03</option>
                                </select>
                            </div>
                        </div>
                        <div class="three-inputes-align">
                            <div class="box">
                                <label for="favcolor1">Guest Name’s Font Color</label>
                                <input type="color" id="favcolor1" name="favcolor1" value="#050505">
                            </div>
                            <div class="box">
                                <label for="favcolor2">Envelope Inner Color</label>
                                <input type="color" id="favcolor2" name="favcolor2" value="#050505">
                            </div>
                            <div class="box">
                                <label for="favcolor3">Envelope Outer Color</label>
                                <input type="color" id="favcolor3" name="favcolor3" value="#050505">
                            </div>
                        </div>
                        <div class="multipal-check-boxes">
                            <h4>Guest Can</h4>
                            <div class="align-check-boxes">
                                <div class="box">
                                    <input type="checkbox" id="attendance-confirmation" name="attendance-confirmation"
                                        value="">
                                    <label for="attendance-confirmation"> Attendance Confirmation</label>
                                </div>
                                <div class="box">
                                    <input type="checkbox" id="select-gift-suggestions" name="select-gift-suggestions"
                                        value="">
                                    <label for="select-gift-suggestions"> Select Gift Suggestions</label>
                                </div>
                                <div class="box">
                                    <input type="checkbox" id="reception-check-in" name="reception-check-in"
                                        value="">
                                    <label for="reception-check-in"> Reception Check-In</label>
                                </div>
                                <div class="box">
                                    <input type="checkbox" id="upload-event-photos" name="upload-event-photos"
                                        value="">
                                    <label for="upload-event-photos"> Upload Event Photos</label>
                                </div>
                                <div class="box">
                                    <input type="checkbox" id="goto-website" name="goto-website" value="">
                                    <label for="goto-website"> Go to Website</label>
                                </div>
                                <div class="box">
                                    <input type="checkbox" id="apologies-for-not-attending"
                                        name="apologies-for-not-attending" value="">
                                    <label for="apologies-for-not-attending"> Apologies For Not Attending</label>
                                </div>
                            </div>
                        </div>
                        <div class="background-select">
                            <h3>Background</h3>
                            <div class="many-radio-boxes">
                                <div class="box">
                                    <input type="radio" id="bg-01" name="background-select" value="bg-01">
                                    <label for="bg-01"><img src="{{ asset('assets/Panel/images/bg-01.png') }}"
                                            alt=""></label>
                                </div>
                                <div class="box">
                                    <input type="radio" id="bg-02" name="background-select" value="bg-02">
                                    <label for="bg-02"><img src="{{ asset('assets/Panel/images/bg-02.png') }}"
                                            alt=""></label>
                                </div>
                                <div class="box">
                                    <input type="radio" id="bg-03" name="background-select" value="bg-03">
                                    <label for="bg-03"><img src="{{ asset('assets/Panel/images/bg-03.png') }}"
                                            alt=""></label>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard Changes</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-dismiss="modal">Save
                        Changes</button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('assets/Panel/js/invitation.js') }}"></script>
<script>
        $(document).ready(function() {});

        const minRange = document.getElementById('minRange');
        const maxRange = document.getElementById('maxRange');
        const sliderRange = document.querySelector('.slider-range');
        const rangeValue = document.getElementById('rangeValue');

        function updateSlider() {
            const min = parseInt(minRange.value);
            const max = parseInt(maxRange.value);

            if (min > max) {
                minRange.value = max;
            }

            sliderRange.style.left = (min / minRange.max) * 100 + '%';
            sliderRange.style.width = ((max - min) / minRange.max) * 100 + '%';
            rangeValue.innerHTML = min + ' - ' + max;
        }

        minRange.addEventListener('input', updateSlider);
        maxRange.addEventListener('input', updateSlider);

        // Initial update
        updateSlider();



        function uploadImageInCanvas(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        // Preview the uploaded image in the custom upload container
        reader.onload = function(e) {
            document.getElementById('uploadPreview').src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }


    </script>
@endsection
