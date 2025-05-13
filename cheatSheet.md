Razor Pages Cheat Sheet (ASP.NET Core)
Updated for Feb 24, 2025

1. File Basics
   File Extension: .cshtml (Razor Page) + .cshtml.cs (PageModel code-behind)
   Default Structure: Pages live in Pages folder (e.g., Pages/Index.cshtml)
2. Key Directives
   @page: Marks the file as a Razor Page
   csharp
   @page
   @model: Links page to PageModel
   csharp
   @page
   @model IndexModel
   @using: Imports namespaces
   csharp
   @using System.Linq
3. PageModel Basics
Class Definition: In Index.cshtml.cs
csharp
public class IndexModel : PageModel
{
public string Message { get; set; }
public void OnGet()
{
Message = "Hello from Razor Pages!";
}
}
Access in Page: @Model
csharp
<p>@Model.Message</p>
4. Common Handlers
   OnGet(): GET requests
   OnPost(): POST requests
   csharp
   public void OnPost()
   {
   // Process form data
   }
   Async: OnGetAsync(), OnPostAsync()
5. Binding Properties
   [BindProperty]: Binds form inputs
   csharp
   [BindProperty]
   public string Name { get; set; }
   In Form:
   csharp
   <input asp-for="Name" />
6. Rendering C# in HTML
@: Inline expression
csharp
<p>Today is: @DateTime.Now</p>
@{ ... }: Code block
csharp
@{
    var greeting = "Hi!";
    <p>@greeting</p>
}
@( ... ): Expressions with spaces
csharp
<p>Last week: @(DateTime.Now - TimeSpan.FromDays(7))</p>
7. Control Structures
   If-Else:
   csharp
   @if (Model.Name != null)
   {
   <p>Hello, @Model.Name!</p>
   }
   else
   {
   <p>No name yet.</p>
   }
   For Loop:
   csharp
   @for (int i = 0; i < 3; i++)
   {
   <p>Count: @i</p>
   }
   Foreach:
   csharp
   @foreach (var item in Model.Items)
   {
   <li>@item</li>
   }
8. Forms with Tag Helpers
Basic Form:
csharp
<form method="post">
    <input asp-for="Name" />
    <button type="submit">Submit</button>
</form>
Tag Helpers:
asp-for: Binds input
asp-page: Links pages (e.g., <a asp-page="/Index">Home</a>)
9. Passing Data
ViewData:
csharp
ViewData["Title"] = "My Page"; // In PageModel
<h1>@ViewData["Title"]</h1>    // In .cshtml
TempData:
csharp
TempData["Message"] = "Saved!";
10. Routing
Default: /PageName
Custom:
csharp
@page "/custom/{id:int}"
Handler:
csharp
<form method="post" asp-page-handler="Custom">
11. Validation
Attributes:
csharp
[Required]
[StringLength(50)]
public string Name { get; set; }
Errors:
csharp
<span asp-validation-for="Name"></span>
<div asp-validation-summary="ModelOnly"></div>
12. Layouts
    Set Layout: In \_ViewStart.cshtml
    csharp
    @{
    Layout = "\_Layout";
    }
    Sections:
    csharp
    @section Scripts {
    <script>console.log("Hello!");</script>
    }
13. Quick Tips
    Comments: @_ Comment _@
    Debugging: Console.WriteLine() or Response.WriteAsync()
    Dependencies:
    csharp
    private readonly ILogger<IndexModel> \_logger;
    public IndexModel(ILogger<IndexModel> logger)
    {
    \_logger = logger;
    }
