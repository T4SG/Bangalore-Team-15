package com.cardboard.photosphere;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class Mactivity extends Activity {

    int var;
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

    }

    Intent i1;
    Intent i2;
    public void myFancyMethod(View v) {
        ((MyApplication) this.getApplication()).setSomeVariable(1);
               i1 = new Intent("android.intent.action.MainActivty");
        startActivity(i1);

    }

    public void myFancyMethod1(View v) {


        ((MyApplication) this.getApplication()).setSomeVariable(2);

        i2= new Intent("android.intent.action.MainActivty");
        startActivity(i2);

    }



    }

