var builder = WebApplication.CreateBuilder(args);

// Add session services
builder.Services.AddSession(options =>
{
    options.IdleTimeout = TimeSpan.FromMinutes(30); // Session timeout
    options.Cookie.HttpOnly = true;  // Cookie is accessible only via HTTP
    options.Cookie.IsEssential = true; // Make the cookie essential for the app
});

// Add distributed memory cache for session data
builder.Services.AddDistributedMemoryCache();

// Add HTTP context accessor
builder.Services.AddHttpContextAccessor();

// Configure routing options
builder.Services.AddRouting(options =>
{
    options.LowercaseUrls = true; // Enforces lowercase URLs
    options.AppendTrailingSlash = false; // Optional: Prevent trailing slashes
});

// Dependency injection configuration
builder.Services.AddScoped<DatabaseHelper>();
builder.Services.AddScoped<TaxPayer>();
builder.Services.AddScoped<Bill>();
builder.Services.AddScoped<Agency>();

// Add Razor Pages services
builder.Services.AddRazorPages();

var app = builder.Build();

// Configure the HTTP request pipeline
if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Error");
    // The default HSTS value is 30 days. You may want to change this for production scenarios, see https://aka.ms/aspnetcore-hsts.
    app.UseHsts();
}

// Middleware to enforce lowercase URLs
app.Use(async (context, next) =>
{
    var originalPath = context.Request.Path.Value;
    if (originalPath != null && originalPath.Any(char.IsUpper))
    {
        context.Response.Redirect(originalPath.ToLowerInvariant());
        return;
    }
    await next();
});

app.UseHttpsRedirection();
app.UseStaticFiles();

// Ensure the middleware is in the correct order
app.UseRouting();
app.UseSession();
app.UseAuthorization();

// Map endpoints
app.MapRazorPages(); 

app.Run();