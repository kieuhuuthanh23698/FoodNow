package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.content.pm.Signature;
import android.graphics.Rect;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Html;
import android.text.Spanned;
import android.text.method.LinkMovementMethod;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.view.ViewTreeObserver;
import android.widget.Button;
import android.widget.EditText;
import android.widget.FrameLayout;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.DAL;
import com.example.acer_pc.foodnow.Object.User;
import com.facebook.AccessToken;
import com.facebook.CallbackManager;
import com.facebook.FacebookCallback;
import com.facebook.FacebookException;
import com.facebook.GraphRequest;
import com.facebook.GraphRequestAsyncTask;
import com.facebook.GraphResponse;
import com.facebook.HttpMethod;
import com.facebook.login.LoginManager;
import com.facebook.login.LoginResult;
import com.facebook.login.widget.LoginButton;
import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.auth.api.signin.GoogleSignIn;
import com.google.android.gms.auth.api.signin.GoogleSignInAccount;
import com.google.android.gms.auth.api.signin.GoogleSignInClient;
import com.google.android.gms.auth.api.signin.GoogleSignInOptions;
import com.google.android.gms.auth.api.signin.GoogleSignInResult;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.SignInButton;
import com.google.android.gms.common.api.GoogleApi;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.common.api.ResultCallback;
import com.google.android.gms.common.api.Status;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.FirebaseApp;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.InstanceIdResult;

import org.json.JSONException;
import org.json.JSONObject;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity implements GoogleApiClient.OnConnectionFailedListener {
    public static User user = null;
    private int RC_SIGN_IN = 001;
    private FrameLayout loginFBview, loginGGview;
    private SignInButton signInButton;
    private LoginButton loginButton;
    FrameLayout main_view;
    LinearLayout group_login_default, group_login_extend;
    EditText input_username, input_password;
    Button loginDefaultButton;

    private CallbackManager callbackManager;
    GoogleSignInOptions gso;
    public static GoogleSignInClient mGoogleSignInClient;
    public static LoginManager loginManager;
    TextView btnBack;

    Spanned Text;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        init();

        //handle event google login
        signInButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Log.i("login google", "\nstart login");
                mGoogleSignInClient.signOut().addOnCompleteListener(new OnCompleteListener<Void>() {
                    @Override
                    public void onComplete(@NonNull Task<Void> task) {
                        if(task.isSuccessful()) {
                            user = null;
                            Log.i("login", "\nlogout gmail success :");
                            Intent signInIntent = mGoogleSignInClient.getSignInIntent();
                            startActivityForResult(signInIntent, RC_SIGN_IN);
                        }
                    }
                });
            }
        });

        //handle event facebook login
        loginButton.registerCallback(callbackManager, new FacebookCallback<LoginResult>() {
            @Override
            public void onSuccess(LoginResult loginResult) {
                user = new User();
                user.setToken(loginResult.getAccessToken().getToken());
                user.setImg("https://graph.facebook.com/" + loginResult.getAccessToken().getUserId() + "/picture?width=500&height=500");
                Bundle parameters = new Bundle();
                parameters.putString("fields","id,name,gender,birthday,email");
                GraphRequestAsyncTask graphRequest =new GraphRequest(
                        loginResult.getAccessToken(),
                        "/" + loginResult.getAccessToken().getUserId() + "/",
                        parameters,
                        HttpMethod.GET,
                        new GraphRequest.Callback() {
                            public void onCompleted(GraphResponse response) {
                                Log.i("login", "\nlogin reponse :" + response.toString());
                                try {
                                        JSONObject graphObject = new JSONObject(response.getJSONObject().toString());
                                        String test = graphObject.toString();
                                    try {
                                        user.setId(graphObject.getString("id"));
                                        user.setName(graphObject.getString("name"));
                                        user.setBirth_day(graphObject.getString("birthday"));
                                        user.setEmail(graphObject.getString("email"));
                                        user.setGender(graphObject.getString("gender"));
                                        user.setType_login(0);
                                        Log.i("login", "\nuser facebook:" + user.toString());
                                        finish();
                                        loginToServer();
                                    } catch (JSONException e1) {
                                        e1.printStackTrace();
                                    }
                                } catch (JSONException e) {
                                    user = null;
                                    Log.i("login", "\nlogin reponse :" + response.toString() + "\nex:" + e.toString());
                                    e.printStackTrace();
                                }
                            }
                        }
                ).executeAsync();
            }

            @Override
            public void onCancel() {
                user = null;
            }

            @Override
            public void onError(FacebookException error) {
                user = null;
                Log.i("login", "\nuser login facebook error :" + error.toString());
            }
        });
    }

    private void init(){
        btnBack = findViewById(R.id.login_act_backBtn);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        loginManager = LoginManager.getInstance();

        //login facebook
        loginButton = findViewById(R.id.login_button);
        loginFBview = findViewById(R.id.login_facebook_view);
        loginFBview.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                loginButton.performClick();
            }
        });
        loginButton.setReadPermissions(Arrays.asList("user_birthday","user_gender","public_profile", "email"));
        callbackManager = CallbackManager.Factory.create();

        //login google
        signInButton = findViewById(R.id.sign_in_button);
        loginGGview = findViewById(R.id.login_google_view);
        loginGGview.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                signInButton.performClick();
            }
        });
        gso = new GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN).requestEmail().build();
        mGoogleSignInClient = GoogleSignIn.getClient(this, gso);
        main_view = findViewById(R.id.login_act_main_view);
        group_login_default= findViewById(R.id.login_act_group_login_defalt);
        group_login_extend = findViewById(R.id.login_act_group_login_extend);
        main_view.getViewTreeObserver().addOnGlobalLayoutListener(new
         ViewTreeObserver.OnGlobalLayoutListener() {
             @Override
             public void onGlobalLayout() {
                 Rect r = new Rect();
                 main_view.getWindowVisibleDisplayFrame(r);
                 int screenHeight = main_view.getRootView().getHeight();
                 int keypadHeight = screenHeight - r.bottom;
                 if (keypadHeight > screenHeight * 0.15) {
                     group_login_default.setVisibility(View.GONE);
                 } else {
                     group_login_default.setVisibility(View.VISIBLE);
                 }
                 input_username.setText(input_username.getText().toString().trim());
             }
         });
        input_username = findViewById(R.id.login_act_input_username);
        input_password = findViewById(R.id.login_act_input_password);
        input_password.setOnFocusChangeListener(new View.OnFocusChangeListener() {
            @Override
            public void onFocusChange(View view, boolean b) {
                if(b){
                    input_username.setText(input_username.getText().toString().trim());
                }
            }
        });
        loginDefaultButton = findViewById(R.id.login_act_loginBtn);
        loginDefaultButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                loginDefault();
            }
        });

    }

    private void loginDefault() {
        if(!input_username.getText().toString().trim().isEmpty() && !input_password.getText().toString().trim().isEmpty()){
            user = new User();
            user.setUsername(input_username.getText().toString().trim());
            user.setPassword(input_password.getText().toString().trim());
            user.setType_login(2);
            Log.i("login", "\nuser default:" + user.toString());
            finish();
            loginToServer();
        } else{
            Toast.makeText(LoginActivity.this, "Bạn phải nhập đầy đủ thông tin !", Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        callbackManager.onActivityResult(requestCode, resultCode , data);
        if (requestCode == RC_SIGN_IN) {
            GoogleSignInResult task = Auth.GoogleSignInApi.getSignInResultFromIntent(data);
            handleSignInResult(task);
        }
    }

    private void handleSignInResult(GoogleSignInResult task) {
        if(task.isSuccess())
        {
            GoogleSignInAccount googleSignInAccount = task.getSignInAccount();
            user = new User();
            user.setId(googleSignInAccount.getId());
            user.setName(googleSignInAccount.getDisplayName());
            user.setEmail(googleSignInAccount.getEmail());
            user.setImg(googleSignInAccount.getPhotoUrl() == null ? "" : googleSignInAccount.getPhotoUrl().toString());
            user.setType_login(1);
            Log.i("login", "\nuser gmail:" + user.toString());
            finish();
            loginToServer();
        } else
        {
            user = null;
            Log.i("login", "\nlogin gmail failed");
        }
    }

    private void loginToServer(){
        if(user != null){
            Intent intent = new Intent(getApplicationContext(), LoadingActivity.class);
            intent.setAction(Intent.ACTION_SEND);
            intent.putExtra("action", DefineVarible.loginToServer);
            startActivity(intent);
        }
    }

    @Override
    public void onConnectionFailed(ConnectionResult connectionResult) {}
}
