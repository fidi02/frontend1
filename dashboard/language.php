<?php
if(isset($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "en";
}
if(file_exists("lang/".$_SESSION['lang'].'.php')) {
    include_once ("lang/".$_SESSION['lang'].'.php');
} elseif(file_exists("../lang/".$_SESSION['lang'].'.php')){
    include_once ("../lang/".$_SESSION['lang'].'.php');
} else {
    include_once ("lang/en.php");
}


function lang($text) {
        $array = getEnArray();
        if (in_array($text, $array)) {
            $key = array_search($text, $array);
            if(_l($key)) { $text = _l($key); }
        }
	return $text;
}
function getEnArray(){
    $_l = array(
		'1' => 'Wallet',
        '2' => 'Balances',
        '3' => 'Total Equity',
        '4' => 'Deposit',
        '5' => 'Withdraw',
        '6' => 'Wallet Deposit Address',
        '7' => 'How much would you like to deposit?',
        '8' => 'Write your ',
        '9' => ' wallet here',
        '10' => 'All fields are required',
        '11' => 'Wallet Withdraw Address',
        '12' => 'Bank Transfer',
        '13' => 'Crypto',
        '14' => 'Paypal',
        '15' => 'How much would you like to withdraw?',
        '16' => "You can't withdraw more than ",
        '17' => 'Complete',
        '18' => 'Method',
        '19' => 'Date',
        '20' => 'Status',
        '21' => 'Amount',
        '22' => 'Pending',
        '23' => 'Approved',
        '24' => 'Declined',
        '25' => 'Latest Transactions',
        '26' => 'Previous',
        '27' => 'Next',
        '28' => 'There are no transactions',
        '29' => 'Back',
        '30' => 'Dashboard',
        '31' => 'Stock',
        '32' => 'Stock',
        '33' => 'Profile',
        '34' => 'My Wallet',
        '35' => 'Settings',
        '36' => 'Log Out',
        '37' => 'General Information',
        '38' => 'Choose avatar',
        '39' => 'First name',
        '40' => 'Last name',
        '41' => 'Email',
        '42' => 'Phone',
        '43' => 'Language',
        '44' => 'Currency',
        '45' => 'English',
        '46' => 'German',
        '47' => 'Security Information',
        '48' => 'Current password',
        '49' => 'New password',
        '50' => 'Security questions #1',
        '51' => "What's your Mother's middle name?",
        '52' => 'What was the name of your first school?',
        '53' => 'Where did you travel for the first time?',
        '54' => 'Answer',
        '55' => 'Security questions #2',
        '56' => 'Choose...',
        '57' => 'Security questions #3',
        '58' => 'Update',
        '59' => 'Referral Receives',
        '60' => 'Free box',
        '61' => 'Frequently Asked Questions',
        '62' => 'If you have any questions to which you didn’t find the answer for, ask our helpful community on Discord or send us a support ticket. We’re here to help!',
        '63' => 'Go Back',
        '64' => 'How it works',
        '65' => 'CREATE AN ACCOUNT AND TOP UP YOUR BALANCE',
        '66' => 'After logging in to your BamBoom account, you’ll see your profile icon and balance in the top right corner of the website. Click on the yellow plus icon that’s next to your balance. This will direct you to the deposit page. Here, you can send money to your BamBoom account using several different deposit methods, including G2A Pay, Coinbase, and Steam. Next, enter your chosen deposit amount and click the “Proceed Deposit” button. It’s that simple!',
        '67' => 'GET STARTED',
        '68' => 'BROWSE OUR COLLECTIONS',
        '69' => 'BamBoom features a myriad of mystery boxes containing coveted products from exclusive brands such as Nike, Supreme, and more. To view all of the mystery boxes the site offers, head over to the box listing page and browse around. You’re sure to be impressed',
        '70' => 'START BROWSING',
        '71' => 'CHOOSE AND OPEN YOUR MYSTERY BOX',
        '72' => "With our one click unboxing process, getting amazing prizes is fun, easy and fast. BamBoom's product guarantee ensures that each item you see on the site has a real world analogue and will be 100% authentic. Each box also contains descriptions, pricing and probabilities for each product, so you always know exactly what you’re getting.",
        '73' => 'START UNBOXING',
        '74' => 'WITHDRAW, SELL OR UPGRADE YOUR ITEM',
        '75' => 'Getting an item you don’t want is never a problem on BamBoom. If you score big, simply withdraw the item to your home address, and it’ll be in your hands in no time. If you’d prefer something else, you can either sell it for on-site money, or try your luck in the site’s upgrade section. Gone are the days where lootboxes are filled with garbage - BamBoom provides true freedom and liquidity.',
        '76' => 'Transparency and openness - our core values',
        '77' => 'At BamBoom, we take pride in continually upholding our core tenets. Every mystery box has a list of probabilities for each item, so you always know what your chances are - unlike on many similar websites. For our upgrade feature, odds are transparent, with a displayed win percentage for each round. Our site is also provably fair, and we provide an open-source verifier so that our users can authenticate this fact for themselves.',
        '78' => 'Get a free Mysterybox by entring a code here',
        '79' => 'APPLY',
        '80' => 'We often send promo codes to our most active community members. If you get one, can enter the code here and open a free box',
        '81' => 'Enter Code',
        '82' => 'Roll',
        '83' => 'Open Box',
        '84' => 'ITEMS IN THIS BOX',
        '85' => 'You won',
        '86' => 'Try again',
        '87' => 'Sell',
        '88' => "Scroll down to see some real prizes received by real Lootie players just like you! These pictures and videos have been shared on social media by happy Lootie customers. If you're excited to show off your Lootie swag, send a picture/video to shipping@lootie.com and you'll be featured on this page! You'll also receive a cash bonus into your Lootie account as a token of our appreciation.",
        '89' => "INSTRUCTIONS",
        '90' => 'Make a video or photos with unboxing.',
        '91' => 'Post it into your social account (Facebook, Instagram, YouTube) with tags: #lootie #lootielunboxing #lootiedelivery',
        '92' => 'Email us on support@lootie.com with the link to this post, your name, and ID on the site.',
        '93' => 'Unboxings From Our Customers',
        '94' => 'Inventory',
        '95' => 'Are you an online entertainer of any sort? Twitch? Youtube?',
        '96' => 'Perhaps own an e-sports team? You-re at the right place',
        '97' => 'PARTNER@LOOTIE.COM',
        '98' => 'Contact Email',
        '99' => 'Deposit Balance',
        '100' => 'Select a payment method and add money to your wallet instantly',
        '101' => 'CHOOSE PAYMENT METHOD',
        '102' => 'Credit Card',
        '103' => 'Crypto',
        '104' => 'G2A',
        '105' => 'Gift Cards',
        '106' => 'PAY',
        '107' => 'OFFICIAL',
        '108' => 'CENT BOX',
        '109' => 'STREET WEAR',
        '110' => 'ELECTRONICS',
        '111' => 'BATTLE BOXES',
        '112' => 'NEW BOXES',
        '113' => 'Browse box',
        '114' => 'PROVABLY FAIR',
        '115' => 'Top-up your account',
        '116' => 'Select a payment method and add credit to your wallet instantly',
        '117' => 'SELECT YOUR AMOUNT',
        '118' => 'PROCESS CHECKOUT',
        '119' => 'Latest transactions',
        '120' => 'Please send',
        '121' => 'and wait approximately 30min and click verify.',
        '122' => 'Transaction id',
        '123' => 'Address',
        '124' => 'Date',
        '125' => 'You dont have any transactions!',
        '126' => 'Purchase a BamBoom gift card',
        '127' => 'APPLY GIFTCARD',
        '128' => 'This giftcard doesnt exist or has been expired!',
        '129' => 'Unboxed Boxes',
        '130' => 'Deposited Balance',
        '131' => 'SIGN OUT',
        '132' => 'SHIPPING ADDRESS',
        '133' => 'FIRST NAME',
        '134' => 'LAST NAME',
        '135' => 'STREET ADDRESS',
        '136' => 'CITY',
        '137' => 'POSTAL CODE',
        '138' => 'COUNTRY',
        '139' => 'STATE/PROVINCE',
        '140' => 'PHONE',
        '141' => 'Save Info',
        '142' => 'Since',
        '143' => 'To be defined',
        '144' => 'Here are the items you own, you can either withdraw or sell them',
        '145' => 'SELL',
        '146' => 'WITHDRAW',
        '147' => 'Search items...',
        '148' => 'SELECT ALL',
        '149' => 'PRICE',
        '150' => 'HIGH',
        '151' => 'LOW',
        '152' => 'If youre having troubles with depositing balance send us a ticket',
        '153' => 'DEPOSITS',
        '154' => 'WITHDRAWS',
        '155' => 'IMAGE',
        '156' => 'NAME',
        '157' => 'PAYMENT METHOD',
        '158' => 'AMOUNT',
        '159' => 'STATUS',
        '160' => 'No records',
        '161' => 'DATE',
        '162' => 'Shipping',
        '163' => 'Pending',
        '164' => 'You need to login first!',
        '165' => 'Error: This giftcard doesnt exist or has been expired!',
        '166' => 'Email or password are wrong',
        '167' => "Fields can't be empty!",
        '168' => 'Email already exsts!',
        '169' => 'Error while creating your Account!',
        '170' => 'Please confrim your password!',
        '171' => 'Login or register to continue',
        '172' => 'Updated Successfully!',
        '173' => 'Something went wrong! Try again',
        '174' => 'Fields cant be empty!',
        '175' => 'Something went wrong',
        '176' => 'English',
        '177' => 'Albanian'
	);
        return $_l;
}