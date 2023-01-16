	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"> <span>Main</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a class="{{ Session::Get('MENU') == 'dashboard' ? 'active' : '' }}" href="{{ route('home') }}">Admin Dashboard</a></li>
                            <li><a class="{{ Session::Get('MENU') == 'emdashboard' ? 'active' : '' }}" href="{{ route('em/dashboard') }}">Employee Dashboard</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role_name=='2')
                        <li class="submenu"> <a href="#"><i class="fa fa-building"></i> <span> Organization Information</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="{{ Session::Get('MENU') == 'company' ? 'active' : '' }}" href="{{ route('Org.company') }}">Company Setting</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'employmentType' ? 'active' : '' }}" href="{{ route('Org.employmentType') }}">Employment Type</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'grade' ? 'active' : '' }}" href="{{ route('Org.grade') }}">Grade</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'rank' ? 'active' : '' }}" href="{{ route('Org.rank') }}">Rank</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'jobClass' ? 'active' : '' }}" href="{{ route('Org.jobClass') }}">Job Class</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'organizationLevel' ? 'active' : '' }}" href="{{ route('Org.organizationLevel') }}">Organization Level</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'organizationStructure' ? 'active' : '' }}" href="{{ route('Org.organizationStructure') }}">Organization Structure</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'jobLevel' ? 'active' : '' }}" href="{{ route('Org.jobLevel') }}">Job Level</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'position' ? 'active' : '' }}" href="{{ route('Org.position') }}">Position</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'workLocation' ? 'active' : '' }}" href="{{ route('Org.workLocation') }}">Work Location</a></li>
                            </ul>
                        </li>
                    @endif
                    <!-- class="noti-dot" -->
                    <li class="submenu"> <a href="#"><i class="fa fa-plane"></i> <span> Leave Administration</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a  class="{{ Session::Get('MENU') == 'leaveTypeSetting' ? 'active' : '' }}" href="{{ route('Leave.leaveTypeSetting') }}">Leave Type Setting</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'massLeavePeriod' ? 'active' : '' }}" href="{{ route('Leave.massLeavePeriod') }}">Mass Leave Period</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'generateELB' ? 'active' : '' }}" href="{{ route('Leave.generateELB') }}">Generate ELB</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'employeeLeaveBalance' ? 'active' : '' }}" href="{{ route('Leave.employeeLeaveBalance') }}">Employee Leave Balance(ELB)</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'employeeMassLeave' ? 'active' : '' }}" href="{{ route('Leave.employeeMassLeave') }}">Employee Mass Leave</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'leaveRequest' ? 'active' : '' }}" href="{{ route('Leave.leaveRequest') }}">Leave Request</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'leaveRequestHRSS' ? 'active' : '' }}" href="{{ route('Leave.leaveRequestHRSS') }}">Leave Request HRSS</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'cashOutLeaveCalculation' ? 'active' : '' }}" href="{{ route('Leave.cashOutLeaveCalculation') }}">CashOut Leave Calculation</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'report' ? 'active' : '' }}" href="">Report</a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i> <span> Personal Information</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                <a class="{{ Session::Get('MENU') == 'allEmployees' ? 'active' : '' }}" href="{{ route('all/employee/list') }}">All Employees</a>
                            </li>
                        </ul>
                    </li>
                    @if (Auth::user()->role_name=='1' || Auth::user()->role_name=='2')
                        <li class="menu-title"> <span>Authentication</span> </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="la la-user-secret"></i> <span> User Controller</span> <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a  class="{{ Session::Get('MENU') == 'userManagement' ? 'active' : '' }}" href="{{ route('userManagement') }}">All User</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'activityLog' ? 'active' : '' }}" href="{{ route('activity/log') }}">Activity Log</a></li>
                                <li><a  class="{{ Session::Get('MENU') == 'activityUser' ? 'active' : '' }}" href="{{ route('activity/login/logout') }}">Activity User</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="menu-title"> <span>Employees</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                <a href="{{ route('all/employee/list') }}">All Employees</a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'holidays' ? 'active' : '' }}" href="{{ route('form/holidays/new') }}">Holidays</a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'leavesAdmin' ? 'active' : '' }}" href="{{ route('form/leaves/new') }}">
                                    Leaves (Admin) <span class="badge badge-pill bg-primary float-right">1</span>
                                </a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'leavesEmployee' ? 'active' : '' }}" href="{{route('form/leavesemployee/new')}}">Leaves (Employee)</a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'leavesSettings' ? 'active' : '' }}" href="{{ route('form/leavesettings/page') }}">Leave Settings</a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'attendanceAdmin' ? 'active' : '' }}" href="{{ route('attendance/page') }}">Attendance (Admin)</a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'AttendanceEmployee' ? 'active' : '' }}" href="{{ route('attendance/employee/page') }}">Attendance (Employee)</a>
                            </li>
                            <!-- <li>
                                <a  class="{{ Session::Get('MENU') == 'departments' ? 'active' : '' }}" href="departments.html">Departments</a>
                            </li> -->
                            <!-- <li>
                                <a  class="{{ Session::Get('MENU') == 'designations' ? 'active' : '' }}" href="designations.html">Designations</a>
                            </li> -->
                            <!-- <li>
                                <a  class="{{ Session::Get('MENU') == 'timesheet' ? 'active' : '' }}" href="timesheet.html">Timesheet</a>
                            </li> -->
                            <!-- <li>
                                <a  class="{{ Session::Get('MENU') == 'shiftScheduling' ? 'active' : '' }}" href="shift-scheduling.html">Shift & Schedule</a>
                            </li> -->
                            <!-- <li>
                                <a  class="{{ Session::Get('MENU') == 'overtime' ? 'active' : '' }}" href="overtime.html">Overtime</a>
                            </li> -->
                        </ul>
                    </li>
                    <!-- <li class="submenu"> <a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'projects' ? 'active' : '' }}" href="projects.html">Projects</a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'tasks' ? 'active' : '' }}" href="tasks.html">Tasks</a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'board' ? 'active' : '' }}" href="task-board.html">Task Board</a>
                            </li>
                        </ul> -->
                    </li>
                    <li class="menu-title"> <span>HR</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-files-o"></i> <span> Sales </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'estimates' ? 'active' : '' }}" href="estimates.html">Estimates</a></li> -->
                            <li><a  class="{{ Session::Get('MENU') == 'invoices' ? 'active' : '' }}" href="{{ route('form/invoice/view/page') }}">Invoices</a></li>
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'payments' ? 'active' : '' }}" href="payments.html">Payments</a></li> -->
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'expences' ? 'active' : '' }}" href="expenses.html">Expenses</a></li> -->
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'providentFund' ? 'active' : '' }}" href="provident-fund.html">Provident Fund</a></li> -->
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'taxes' ? 'active' : '' }}" href="taxes.html">Taxes</a></li> -->
                        </ul>
                    </li>
                    <!-- <li class="submenu"> <a href="#"><i class="la la-files-o"></i> <span> Accounting </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a  class="{{ Session::Get('MENU') == 'categories' ? 'active' : '' }}" href="categories.html">Categories</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'budgets' ? 'active' : '' }}" href="budgets.html">Budgets</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'budgetExpenses' ? 'active' : '' }}" href="budget-expenses.html">Budget Expenses</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'budgetRevenues' ? 'active' : '' }}" href="budget-revenues.html">Budget Revenues</a></li>
                        </ul>
                    </li> -->
                    <li class="submenu"> <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a  class="{{ Session::Get('MENU') == 'salary' ? 'active' : '' }}" href="{{ route('form/salary/page') }}"> Employee Salary </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'salaryView' ? 'active' : '' }}" href="{{ url('form/salary/view') }}"> Payslip </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'payrollItems' ? 'active' : '' }}" href="{{ route('form/payroll/items') }}"> Payroll Items </a></li>
                        </ul>
                    </li>
                    <!-- <li> <a href="policies.html"><i class="la la-file-pdf-o"></i> <span>Policies</span></a> </li> -->
                    <li class="submenu"> <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a  class="{{ Session::Get('MENU') == 'expenseReports' ? 'active' : '' }}" href="{{ route('form/expense/reports/page') }}"> Expense Report </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'invoiceReports' ? 'active' : '' }}" href="{{ route('form/invoice/reports/page') }}"> Invoice Report </a></li>
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'paymentsReports' ? 'active' : '' }}" href="payments-reports.html"> Payments Report </a></li> -->
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'projectReports' ? 'active' : '' }}" href="project-reports.html"> Project Report </a></li> -->
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'taskReports' ? 'active' : '' }}" href="task-reports.html"> Task Report </a></li> -->
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'userReports' ? 'active' : '' }}" href="user-reports.html"> User Report </a></li> -->
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'employeeReports' ? 'active' : '' }}" href="employee-reports.html"> Employee Report </a></li> -->
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'payslipReports' ? 'active' : '' }}" href="payslip-reports.html"> Payslip Report </a></li> -->
                            <!-- <li><a  class="{{ Session::Get('MENU') == 'attendanceReports' ? 'active' : '' }}" href="attendance-reports.html"> Attendance Report </a></li> -->
                            <li><a  class="{{ Session::Get('MENU') == 'leaveReports' ? 'active' : '' }}" href="{{ route('form/leave/reports/page') }}"> Leave Report </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'dailyReports' ? 'active' : '' }}" href="{{ route('form/daily/reports/page') }}"> Daily Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Performance</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'performanceIndicator' ? 'active' : '' }}" href="{{ route('form/performance/indicator/page') }}"> Performance Indicator </a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'performance' ? 'active' : '' }}" href="{{ route('form/performance/page') }}"> Performance Review </a>
                            </li>
                            <li>
                                <a  class="{{ Session::Get('MENU') == 'performanceAppraisal' ? 'active' : '' }}" href="{{ route('form/performance/appraisal/page') }}"> Performance Appraisal </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="submenu"> <a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a  class="{{ Session::Get('MENU') == 'goalTracking' ? 'active' : '' }}" href="goal-tracking.html"> Goal List </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'goalType' ? 'active' : '' }}" href="goal-type.html"> Goal Type </a></li>
                        </ul>
                    </li> -->
                    <li class="submenu"> <a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a  class="{{ Session::Get('MENU') == 'training' ? 'active' : '' }}" href="{{ route('form/training/list/page') }}"> Training List </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'trainers' ? 'active' : '' }}" href="{{ route('form/trainers/list/page') }}"> Trainers</a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'trainingType' ? 'active' : '' }}" href="{{ route('form/training/type/list/page') }}"> Training Type </a></li>
                        </ul>
                    </li>
                    <!-- <li><a  class="{{ Session::Get('MENU') == 'promotion' ? 'active' : '' }}" href="promotion.html"><i class="la la-bullhorn"></i> <span>Promotion</span></a></li> -->
                    <!-- <li><a  class="{{ Session::Get('MENU') == 'resignation' ? 'active' : '' }}" href="resignation.html"><i class="la la-external-link-square"></i> <span>Resignation</span></a></li> -->
                    <!-- <li><a  class="{{ Session::Get('MENU') == 'termination' ? 'active' : '' }}" href="termination.html"><i class="la la-times-circle"></i> <span>Termination</span></a></li> -->
                    <!-- <li class="menu-title"> <span>Administration</span> </li>
                    <li> <a href="assets.html"><i class="la la-object-ungroup"></i> <span>Assets</span></a> </li>
                    <li class="submenu"> <a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a  class="{{ Session::Get('MENU') == 'userDashboard' ? 'active' : '' }}" href="user-dashboard.html"> User Dasboard </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'jobsDashboard' ? 'active' : '' }}" href="jobs-dashboard.html"> Jobs Dasboard </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'jobs' ? 'active' : '' }}" href="jobs.html"> Manage Jobs </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'manageResumes' ? 'active' : '' }}" href="manage-resumes.html"> Manage Resumes </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'shortlistCandidates' ? 'active' : '' }}" href="shortlist-candidates.html"> Shortlist Candidates </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'interviewQuestions' ? 'active' : '' }}" href="interview-questions.html"> Interview Questions </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'offerApprovals' ? 'active' : '' }}" href="offer_approvals.html"> Offer Approvals </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'experianceLevel' ? 'active' : '' }}" href="experiance-level.html"> Experience Level </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'candidates' ? 'active' : '' }}" href="candidates.html"> Candidates List </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'scheduleTiming' ? 'active' : '' }}" href="schedule-timing.html"> Schedule timing </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'apptitudeResult' ? 'active' : '' }}" href="apptitude-result.html"> Aptitude Results </a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a  class="{{ Session::Get('MENU') == 'profile' ? 'active' : '' }}" href="profile.html"> Employee Profile </a></li>
                            <li><a  class="{{ Session::Get('MENU') == 'clientProfile' ? 'active' : '' }}" href="client-profile.html"> Client Profile </a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
	<!-- /Sidebar -->