package com.cardboard.photosphere;

import android.app.Activity;
import android.app.Application;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;


public class MyApplication extends Application {

    private int someVariable;

    public int getSomeVariable() {
        return someVariable;
    }

    public void setSomeVariable(int someVariable) {
        this.someVariable = someVariable;
    }
}





