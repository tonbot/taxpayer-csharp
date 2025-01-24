var builder = WebApplication.CreateBuilder(args);


builder.Services.AddRouting(options =>
{
    options.LowercaseUrls = true; // Enforces lowercase URLs
    options.AppendTrailingSlash = false; // Optional: Prevent trailing slashes
});



//dependency injection configuration
builder.Services.AddScoped<DatabaseHelper>();
builder.Services.AddScoped<User>();
builder.Services.AddScoped<Bill>();
builder.Services.AddScoped<Agency>();




// Add services to the container.
builder.Services.AddRazorPages();

var app = builder.Build();

// Configure the HTTP request pipeline.
if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Error");
    // The default HSTS value is 30 days. You may want to change this for production scenarios, see https://aka.ms/aspnetcore-hsts.
    app.UseHsts();
}

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

app.UseRouting();
app.UseEndpoints(endpoints =>
{
    endpoints.MapControllers();
});

app.UseAuthorization();

app.MapRazorPages();

app.Run();
