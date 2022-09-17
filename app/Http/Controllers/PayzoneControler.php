<?php
use PayXpert\Connect2Pay\Connect2PayClient;
    use PayXpert\Connect2Pay\containers\request\PaymentPrepareRequest;
    use PayXpert\Connect2Pay\containers\Order;
    use PayXpert\Connect2Pay\containers\Shipping;
    use PayXpert\Connect2Pay\containers\Shopper;
    use PayXpert\Connect2Pay\containers\Account;
    use PayXpert\Connect2Pay\containers\constant\OrderShippingType;
    use PayXpert\Connect2Pay\containers\constant\OrderType;
    use PayXpert\Connect2Pay\containers\constant\PaymentMethod;
    use PayXpert\Connect2Pay\containers\constant\PaymentMode;
    use PayXpert\Connect2Pay\containers\constant\AccountAge;
    use PayXpert\Connect2Pay\containers\constant\AccountLastChange;
    use PayXpert\Connect2Pay\containers\constant\AccountPaymentMeanAge;
    class PayzoneControler extends Controller
    {
        public function Payment(){
    $connect2pay = "https://paiement.payzone.ma";
    // This will be provided once your account is approved
    $originator  = "107123";
    $password    = "G 6h8a@CzbVRzKex7x";
  


    $c2pClient = new Connect2PayClient($connect2pay, $originator, $password);

    $prepareRequest = new PaymentPrepareRequest();
    $shopper = new Shopper();
    $account = new Account();
    $order = new Order();
    $shipping = new Shipping();

    // Set all information for the payment
    $prepareRequest->setPaymentMethod(PaymentMethod::CREDIT_CARD);
    $prepareRequest->setPaymentMode(PaymentMode::SINGLE);
    // To charge €25.99
    $prepareRequest->setCurrency("EUR");
    $prepareRequest->setAmount(2599);
    // Extra custom data that are returned with the payment status
    $prepareRequest->setCtrlCustomData("Give that back to me please!!");
    // Where the customer will be redirected after the payment
    $prepareRequest->setCtrlRedirectURL("https://merchant.example.com/payment/redirect");
    // URL on the merchant site that will receive the callback notification
    $prepareRequest->setCtrlCallbackURL("https://merchant.example.com/payment/callback");

    $order->setId("ABC-123456");
    $order->setShippingType(OrderShippingType::DIGITAL_GOODS);
    $order->setType(OrderType::GOODS_SERVICE);
    $order->setDescription("Payment of €25.99");

    $shopper->setId("1234567WX");
    $shopper->setFirstName("John")->setLastName("Doe");
    $shopper->setAddress1("Debit Street, 45");
    $shopper->setZipcode("3456TRG")->setCity("New York")->setState("NY")->setCountryCode("US");
    $shopper->setHomePhonePrefix("212")->setHomePhone("12345678");
    $shopper->setEmail("shopper@example.com");

    $account->setAge(AccountAge::LESS_30_DAYS);
    $account->setDate("20210106");
    $account->setLastChange(AccountLastChange::LESS_30_DAYS);
    $account->setLastChangeDate("20210106");
    $account->setPaymentMeanAge(AccountPaymentMeanAge::LESS_30_DAYS);
    $account->setPaymentMeanDate("20210106");
    // Set 'true' to trigger SCA challenge
    $account->setSuspicious(false);

    $shipping->setName("Lady Gogo");
    $shipping->setAddress1("125 Main Street");
    $shipping->setZipcode("ABC-5678")->setState("NY")->setCity("New York")->setCountryCode("US");
    $shipping->setPhone("+47123456789");

    $shopper->setAccount($account);
    $prepareRequest->setShopper($shopper);
    $prepareRequest->setOrder($order);
    $prepareRequest->setShipping($shipping);

    $result = $c2pClient->preparePayment($prepareRequest);
    if ($result !== false) {
        // The customer token info returned by the payment page could be saved in session (may
        // be used later when the customer will be redirected from the payment page)
        $_SESSION['merchantToken'] = $result->getMerchantToken();
        
        // The merchantToken must also be used later to validate the callback to avoid that anyone
        // could call it and abusively validate the payment. It may be stored in local database for this.
        
        // Now redirect the customer to the payment page
        return redirect()->away($c2pClient->getCustomerRedirectURL());
    } else {
        echo "Payment preparation error occurred: " . $c2pClient->getClientErrorMessage() . "\n";
    }
}
}
    ?>
