const data = {
    provinces: [
        { value: 'hanoi', text: 'Hà Nội' },
        { value: 'hcm', text: 'TP Hồ Chí Minh' },
        { value: 'danang', text: 'Đà Nẵng' },
        { value: 'angiang', text: 'An Giang' },
        { value: 'bacgiang', text: 'Bắc Giang' },
        { value: 'backan', text: 'Bắc Kạn' },
        { value: 'baclieu', text: 'Bạc Liêu' },
        { value: 'bacninh', text: 'Bắc Ninh' },
        { value: 'bariavungtau', text: 'Bà Rịa - Vũng Tàu' },
        { value: 'bentre', text: 'Bến Tre' },
        { value: 'binhdinh', text: 'Bình Định' },
        { value: 'binhduong', text: 'Bình Dương' },
        { value: 'binhphuoc', text: 'Bình Phước' },
        { value: 'binhthuan', text: 'Bình Thuận' },
        { value: 'camau', text: 'Cà Mau' },
        { value: 'cantho', text: 'Cần Thơ' },
        { value: 'caobang', text: 'Cao Bằng' },
        { value: 'daklak', text: 'Đắk Lắk' },
        { value: 'daknong', text: 'Đắk Nông' },
        { value: 'dienbien', text: 'Điện Biên' },
        { value: 'dongnai', text: 'Đồng Nai' },
        { value: 'dongthap', text: 'Đồng Tháp' },
        { value: 'gialai', text: 'Gia Lai' },
        { value: 'hagiang', text: 'Hà Giang' },
        { value: 'hatinh', text: 'Hà Tĩnh' },
        { value: 'haiduong', text: 'Hải Dương' },
        { value: 'haiphong', text: 'Hải Phòng' },
        { value: 'haugiang', text: 'Hậu Giang' },
        { value: 'hoabinh', text: 'Hòa Bình' },
        { value: 'hungyen', text: 'Hưng Yên' },
        { value: 'khanhhoa', text: 'Khánh Hòa' },
        { value: 'kiengiang', text: 'Kiên Giang' },
        { value: 'kontum', text: 'Kon Tum' },
        { value: 'laichau', text: 'Lai Châu' },
        { value: 'lamdong', text: 'Lâm Đồng' },
        { value: 'langson', text: 'Lạng Sơn' },
        { value: 'laocai', text: 'Lào Cai' },
        { value: 'longan', text: 'Long An' },
        { value: 'namdinh', text: 'Nam Định' },
        { value: 'nghean', text: 'Nghệ An' },
        { value: 'ninhbinh', text: 'Ninh Bình' },
        { value: 'ninhthuan', text: 'Ninh Thuận' },
        { value: 'phutho', text: 'Phú Thọ' },
        { value: 'phuyen', text: 'Phú Yên' },
        { value: 'quangbinh', text: 'Quảng Bình' },
        { value: 'quangnam', text: 'Quảng Nam' },
        { value: 'quangngai', text: 'Quảng Ngãi' },
        { value: 'quangninh', text: 'Quảng Ninh' },
        { value: 'quangtri', text: 'Quảng Trị' },
        { value: 'soctrang', text: 'Sóc Trăng' },
        { value: 'sonla', text: 'Sơn La' },
        { value: 'tayninh', text: 'Tây Ninh' },
        { value: 'thaibinh', text: 'Thái Bình' },
        { value: 'thainguyen', text: 'Thái Nguyên' },
        { value: 'thanhhoa', text: 'Thanh Hóa' },
        { value: 'thuathienhue', text: 'Thừa Thiên Huế' },
        { value: 'tiengiang', text: 'Tiền Giang' },
        { value: 'travinh', text: 'Trà Vinh' },
        { value: 'tuyenquang', text: 'Tuyên Quang' },
        { value: 'vinhlong', text: 'Vĩnh Long' },
        { value: 'vinhphuc', text: 'Vĩnh Phúc' },
        { value: 'yenbai', text: 'Yên Bái' }
    ],
    districts: {
        hanoi: [
            { value: 'ba_dinh', text: 'Ba Đình' },
            { value: 'bac_tu_liem', text: 'Bắc Từ Liêm' },
            { value: 'cau_giay', text: 'Cầu Giấy' },
            { value: 'dong_da', text: 'Đống Đa' },
            { value: 'ha_dong', text: 'Hà Đông' },
            { value: 'hai_ba_trung', text: 'Hai Bà Trưng' },
            { value: 'hoan_kiem', text: 'Hoàn Kiếm' },
            { value: 'hoang_mai', text: 'Hoàng Mai' },
            { value: 'long_bien', text: 'Long Biên' },
            { value: 'nam_tu_liem', text: 'Nam Từ Liêm' },
            { value: 'tay_ho', text: 'Tây Hồ' },
            { value: 'thanh_xuan', text: 'Thanh Xuân' },
            { value: 'soc_son', text: 'Sóc Sơn' },
            { value: 'dong_anh', text: 'Đông Anh' },
            { value: 'gia_lam', text: 'Gia Lâm' },
            { value: 'me_linh', text: 'Mê Linh' },
            { value: 'thanh_tri', text: 'Thanh Trì' },
            { value: 'thuong_tin', text: 'Thường Tín' },
            { value: 'phu_xuyen', text: 'Phú Xuyên' },
            { value: 'ung_hoa', text: 'Ứng Hòa' },
            { value: 'my_duc', text: 'Mỹ Đức' },
            { value: 'ba_vi', text: 'Ba Vì' },
            { value: 'phuc_tho', text: 'Phúc Thọ' },
            { value: 'dan_phuong', text: 'Đan Phượng' },
            { value: 'hoai_duc', text: 'Hoài Đức' },
            { value: 'thach_that', text: 'Thạch Thất' },
            { value: 'quoc_oai', text: 'Quốc Oai' },
            { value: 'chuong_my', text: 'Chương Mỹ' },
            { value: 'thanh_oa', text: 'Thanh Oai' },
            { value: 'son_tay', text: 'Sơn Tây' }
        ],
        hcm: [
            { value: 'quan1', text: 'Quận 1' },
            { value: 'quan2', text: 'Quận 2' },
            { "value": "quan3", "text": "Quận 3" },
            { "value": "quan4", "text": "Quận 4" },
            { "value": "quan5", "text": "Quận 5" },
            { "value": "quan6", "text": "Quận 6" },
            { "value": "quan7", "text": "Quận 7" },
            { "value": "quan8", "text": "Quận 8" },
            { "value": "quan9", "text": "Quận 9" },
            { "value": "quan10", "text": "Quận 10" },
            { "value": "quan11", "text": "Quận 11" },
            { "value": "quan12", "text": "Quận 12" },
            { "value": "binhthanh", "text": "Quận Bình Thạnh" },
            { "value": "thuduc", "text": "Quận Thủ Đức" },
            { "value": "govap", "text": "Quận Gò Vấp" },
            { "value": "phunhuan", "text": "Quận Phú Nhuận" },
            { "value": "tanbinh", "text": "Quận Tân Bình" },
            { "value": "tanphu", "text": "Quận Tân Phú" },
            { "value": "binhtan", "text": "Quận Bình Tân" },
            { "value": "nhatrang", "text": "Quận Nhà Bè" },
            { "value": "canhohcm", "text": "Quận Cần Giờ" }
        ],
        danang: [
            { value: 'haichau', text: 'Hải Châu' },
            { value: 'thanhkhe', text: 'Thanh Khê' },
            { value: 'haichau', text: 'Hải Châu' },
            { value: 'thanhkhe', text: 'Thanh Khê' },
            { value: 'camle', text: 'Cẩm Lệ' },
            { value: 'sontra', text: 'Sơn Trà' },
            { value: 'nguhanhson', text: 'Ngũ Hành Sơn' },
            { value: 'lienchieu', text: 'Liên Chiểu' },
            { value: 'hoavang', text: 'Hòa Vang' },
            { value: 'hoangsa', text: 'Hoàng Sa' }
        ],
        angiang: [
            { value: 'longxuyen', text: 'Long Xuyên' },
            { value: 'chauphu', text: 'Châu Phú' },
            { value: 'chauthanh', text: 'Châu Thành' },
            { value: 'cho-moi', text: 'Chợ Mới' },
            { value: 'tan-chau', text: 'Tân Châu' },
            { value: 'phutan', text: 'Phú Tân' },
            { value: 'thotnot', text: 'Thoại Sơn' },
            { value: 'trilinh', text: 'Tri Tôn' },
            { value: 'tinhbien', text: 'Tịnh Biên' },
            { value: 'anphu', text: 'An Phú' },
            { value: 'chardoc', text: 'Châu Đốc' }
        ],

        bacgiang: [
            { value: 'hiep-hoa', text: 'Hiệp Hòa' },
            { value: 'luc-nam', text: 'Lục Nam' },
            { value: 'luc-ngan', text: 'Lục Ngạn' },
            { value: 'lang-giang', text: 'Lạng Giang' },
            { value: 'son-dong', text: 'Sơn Động' },
            { value: 'tan-yen', text: 'Tân Yên' },
            { value: 'viet-yen', text: 'Việt Yên' },
            { value: 'yen-dung', text: 'Yên Dũng' },
            { value: 'yen-the', text: 'Yên Thế' }
        ],

        backan: [
            { value: 'bachthong', text: 'Bạch Thông' },
            { value: 'baBe', text: 'Ba Bể' },
            { value: 'choDon', text: 'Chợ Đồn' },
            { value: 'choMoi', text: 'Chợ Mới' },
            { value: 'naRi', text: 'Na Rì' },
            { value: 'nguong', text: 'Ngân Sơn' },
            { value: 'pacNam', text: 'Pác Nặm' }
        ],

        baclieu: [
            { value: 'dongHai', text: 'Đông Hải' },
            { value: 'giaRai', text: 'Giá Rai' },
            { value: 'hoaBinh', text: 'Hòa Bình' },
            { value: 'hongDan', text: 'Hồng Dân' },
            { value: 'phuocLong', text: 'Phước Long' },
            { value: 'vinhLoi', text: 'Vĩnh Lợi' }
        ],

        bacninh: [
            { value: 'giaBinh', text: 'Gia Bình' },
            { value: 'luongTai', text: 'Lương Tài' },
            { value: 'queVo', text: 'Quế Võ' },
            { value: 'thuanThanh', text: 'Thuận Thành' },
            { value: 'tienDu', text: 'Tiên Du' },
            { value: 'tuSon', text: 'Từ Sơn' },
            { value: 'yenPhong', text: 'Yên Phong' }
        ],

        bariavungtau: [
            { value: 'baRia', text: 'Bà Rịa' },
            { value: 'chonThanh', text: 'Châu Đức' },
            { value: 'conDao', text: 'Côn Đảo' },
            { value: 'datDo', text: 'Đất Đỏ' },
            { value: 'longDien', text: 'Long Điền' },
            { value: 'phuMy', text: 'Phú Mỹ' },
            { value: 'vungTau', text: 'Vũng Tàu' },
            { value: 'xuyenMoc', text: 'Xuyên Mộc' }
        ],

        bentre: [
            { value: 'baTri', text: 'Ba Tri' },
            { value: 'binhDai', text: 'Bình Đại' },
            { value: 'chauThanh', text: 'Châu Thành' },
            { value: 'choLach', text: 'Chợ Lách' },
            { value: 'giongTrom', text: 'Giồng Trôm' },
            { value: 'moCayBac', text: 'Mỏ Cày Bắc' },
            { value: 'moCayNam', text: 'Mỏ Cày Nam' },
            { value: 'thanhPhu', text: 'Thạnh Phú' }
        ],

        binhdinh: [

            { value: 'anLao', text: 'An Lão' },
            { value: 'anNhon', text: 'An Nhơn' },
            { value: 'hoaiAn', text: 'Hoài Ân' },
            { value: 'hoaiNhon', text: 'Hoài Nhơn' },
            { value: 'phuCat', text: 'Phù Cát' },
            { value: 'phuMy', text: 'Phù Mỹ' },
            { value: 'quyNhon', text: 'Quy Nhơn' },
            { value: 'taySon', text: 'Tây Sơn' },
            { value: 'tuyPhuoc', text: 'Tuy Phước' },
            { value: 'vanCanh', text: 'Vân Canh' },
            { value: 'vuBan', text: 'Vũ Bản' }
        ],

        binhduong: [
            { value: 'benCat', text: 'Bến Cát' },
            { value: 'bauBang', text: 'Bàu Bàng' },
            { value: 'dauTieng', text: 'Dầu Tiếng' },
            { value: 'diAn', text: 'Dĩ An' },
            { value: 'phuGiao', text: 'Phú Giáo' },
            { value: 'tanUyen', text: 'Tân Uyên' },
            { value: 'thuDauMot', text: 'Thủ Dầu Một' },
            { value: 'thuanAn', text: 'Thuận An' }
        ],

        binhphuoc: [
            { value: 'buDang', text: 'Bù Đăng' },
            { value: 'buDop', text: 'Bù Đốp' },
            { value: 'buGiaMap', text: 'Bù Gia Mập' },
            { value: 'chonThanh', text: 'Chơn Thành' },
            { value: 'dongPhu', text: 'Đồng Phú' },
            { value: 'dongXoai', text: 'Đồng Xoài' },
            { value: 'honQuan', text: 'Hớn Quản' },
            { value: 'locNinh', text: 'Lộc Ninh' },
            { value: 'phuRieng', text: 'Phú Riềng' }
        ],

        binhthuan: [
            { value: 'bacBinh', text: 'Bắc Bình' },
            { value: 'hamTan', text: 'Hàm Tân' },
            { value: 'hamThuanBac', text: 'Hàm Thuận Bắc' },
            { value: 'hamThuanNam', text: 'Hàm Thuận Nam' },
            { value: 'laGi', text: 'La Gi' },
            { value: 'phanThiet', text: 'Phan Thiết' },
            { value: 'phuQuy', text: 'Phú Quý' },
            { value: 'tanhLinh', text: 'Tánh Linh' },
            { value: 'tuyPhong', text: 'Tuy Phong' }
        ],

        camau: [
            { value: 'caiNuoc', text: 'Cái Nước' },
            { value: 'damDoi', text: 'Đầm Dơi' },
            { value: 'namCan', text: 'Năm Căn' },
            { value: 'ngocHien', text: 'Ngọc Hiển' },
            { value: 'phuTan', text: 'Phú Tân' },
            { value: 'thoiBinh', text: 'Thới Bình' },
            { value: 'tranVanThoi', text: 'Trần Văn Thời' },
            { value: 'uMinh', text: 'U Minh' }
        ],

        cantho: [
            { value: 'binhThuy', text: 'Bình Thủy' },
            { value: 'caiRang', text: 'Cái Răng' },
            { value: 'coDo', text: 'Cờ Đỏ' },
            { value: 'ninhKieu', text: 'Ninh Kiều' },
            { value: 'oMon', text: 'Ô Môn' },
            { value: 'phongDien', text: 'Phong Điền' },
            { value: 'thoiLai', text: 'Thới Lai' },
            { value: 'thotNot', text: 'Thốt Nốt' },
            { value: 'vinhThanh', text: 'Vĩnh Thạnh' }
        ],

        caobang: [
            { value: 'baoLac', text: 'Bảo Lạc' },
            { value: 'baoLam', text: 'Bảo Lâm' },
            { value: 'haLang', text: 'Hạ Lang' },
            { value: 'haQuang', text: 'Hà Quảng' },
            { value: 'hoaAn', text: 'Hòa An' },
            { value: 'nguyenBinh', text: 'Nguyên Bình' },
            { value: 'phucHoa', text: 'Phục Hòa' },
            { value: 'quangUyen', text: 'Quảng Uyên' },
            { value: 'thachAn', text: 'Thạch An' },
            { value: 'thongNong', text: 'Thông Nông' },
            { value: 'trungKhanh', text: 'Trùng Khánh' }
        ],

        daklak: [
            { value: 'buonHo', text: 'Buôn Hồ' },
            { value: 'buonMaThuot', text: 'Buôn Ma Thuột' },
            { value: 'cưKuin', text: 'Cư Kuin' },
            { value: 'cưMgar', text: 'Cư M\'gar' },
            { value: 'eaHleo', text: 'Ea H\'leo' },
            { value: 'eaKar', text: 'Ea Kar' },
            { value: 'eaSup', text: 'Ea Súp' },
            { value: 'krongAna', text: 'Krông Ana' },
            { value: 'krongBong', text: 'Krông Bông' },
            { value: 'krongBuk', text: 'Krông Búk' },
            { value: 'krongNang', text: 'Krông Năng' },
            { value: 'krongPac', text: 'Krông Pắc' },
            { value: 'lak', text: 'Lắk' },
            { value: 'mDrak', text: 'M\'Đrắk' }
        ],

        daknong: [
            { value: 'cuJut', text: 'Cư Jút' },
            { value: 'dakGlong', text: 'Đắk Glong' },
            { value: 'dakMil', text: 'Đắk Mil' },
            { value: 'dakRlap', text: 'Đắk R\'Lấp' },
            { value: 'giaNghia', text: 'Gia Nghĩa' },
            { value: 'krongNo', text: 'Krông Nô' },
            { value: 'tuyDuc', text: 'Tuy Đức' }
        ],

        dienbien: [
            { value: 'dienBienDong', text: 'Điện Biên Đông' },
            { value: 'dienBienPhu', text: 'Điện Biên Phủ' },
            { value: 'muongAng', text: 'Mường Ảng' },
            { value: 'muongCha', text: 'Mường Chà' },
            { value: 'muongLay', text: 'Mường Lay' },
            { value: 'muongNhe', text: 'Mường Nhé' },
            { value: 'namPo', text: 'Nậm Pồ' },
            { value: 'tuaChua', text: 'Tủa Chùa' },
            { value: 'tuanGiao', text: 'Tuần Giáo' }
        ],

        dongnai: [
            { value: 'bienHoa', text: 'Biên Hòa' },
            { value: 'camMy', text: 'Cẩm Mỹ' },
            { value: 'dinhQuan', text: 'Định Quán' },
            { value: 'longKhanh', text: 'Long Khánh' },
            { value: 'longThanh', text: 'Long Thành' },
            { value: 'nhonTrach', text: 'Nhơn Trạch' },
            { value: 'tanPhu', text: 'Tân Phú' },
            { value: 'thongNhat', text: 'Thống Nhất' },
            { value: 'trangBom', text: 'Trảng Bom' },
            { value: 'vĩnhCuu', text: 'Vĩnh Cửu' },
            { value: 'xuanLoc', text: 'Xuân Lộc' }
        ],

        dongthap: [
            { value: 'caiBe', text: 'Cái Bè' },
            { value: 'caoLanh', text: 'Cao Lãnh' },
            { value: 'chauThanh', text: 'Châu Thành' },
            { value: 'hongNgu', text: 'Hồng Ngự' },
            { value: 'laCam', text: 'Lấp Vò' },
            { value: 'tamNong', text: 'Tam Nông' },
            { value: 'tanHong', text: 'Tân Hồng' },
            { value: 'thanhBinh', text: 'Thanh Bình' },
            { value: 'thapMuoi', text: 'Tháp Mười' }
        ],

        gialai: [
            { value: 'anKhe', text: 'An Khê' },
            { value: 'ayunPa', text: 'Ayun Pa' },
            { value: 'chuPah', text: 'Chư Păh' },
            { value: 'chuProng', text: 'Chư Prông' },
            { value: 'chuSe', text: 'Chư Sê' },
            { value: 'chonGom', text: 'Chư Pưh' },
            { value: 'dakDoa', text: 'Đắk Đoa' },
            { value: 'dakPo', text: 'Đắk Pơ' },
            { value: 'iaGrai', text: 'Ia Grai' },
            { value: 'iaPa', text: 'Ia Pa' },
            { value: 'kongChro', text: 'Kông Chro' },
            { value: 'krongChro', text: 'Krông Chro' },
            { value: 'krongPa', text: 'Krông Pa' },
            { value: 'mangYang', text: 'Mang Yang' },
            { value: 'phuThien', text: 'Phú Thiện' },
            { value: 'pleiku', text: 'Pleiku' }
        ],

        hagiang: [
            { value: 'bacMe', text: 'Bắc Mê' },
            { value: 'bacQuang', text: 'Bắc Quang' },
            { value: 'dongVan', text: 'Đồng Văn' },
            { value: 'hoangSuPhi', text: 'Hoàng Su Phì' },
            { value: 'meoVac', text: 'Mèo Vạc' },
            { value: 'quangBinh', text: 'Quang Bình' },
            { value: 'quangBa', text: 'Quản Bạ' },
            { value: 'viXuyen', text: 'Vị Xuyên' },
            { value: 'xinMan', text: 'Xín Mần' },
            { value: 'yenMinh', text: 'Yên Minh' }
        ],

        hatinh: [
            { value: 'camXuyen', text: 'Cẩm Xuyên' },
            { value: 'ducThọ', text: 'Đức Thọ' },
            { value: 'haTinh', text: 'Hà Tĩnh' },
            { value: 'huongKhe', text: 'Hương Khê' },
            { value: 'huongSon', text: 'Hương Sơn' },
            { value: 'kyAnh', text: 'Kỳ Anh' },
            { value: 'locHa', text: 'Lộc Hà' },
            { value: 'nghiXuan', text: 'Nghi Xuân' },
            { value: 'thachHa', text: 'Thạch Hà' },
            { value: 'vuQuang', text: 'Vũ Quang' }
        ],

        haiduong: [
            { value: 'binhGiang', text: 'Bình Giang' },
            { value: 'camGiang', text: 'Cẩm Giàng' },
            { value: 'chiLinh', text: 'Chí Linh' },
            { value: 'giaLoc', text: 'Gia Lộc' },
            { value: 'haiDuong', text: 'Hải Dương' },
            { value: 'kimThanh', text: 'Kim Thành' },
            { value: 'kinhMon', text: 'Kinh Môn' },
            { value: 'namSach', text: 'Nam Sách' },
            { value: 'ninhGiang', text: 'Ninh Giang' },
            { value: 'thanhHa', text: 'Thanh Hà' },
            { value: 'thanhMien', text: 'Thanh Miện' },
            { value: 'tuKy', text: 'Tứ Kỳ' }
        ],

        haiphong: [
            { value: 'anDuong', text: 'An Dương' },
            { value: 'anLao', text: 'An Lão' },
            { value: 'bachLongVi', text: 'Bạch Long Vĩ' },
            { value: 'catHai', text: 'Cát Hải' },
            { value: 'doSon', text: 'Đồ Sơn' },
            { value: 'duongKinh', text: 'Dương Kinh' },
            { value: 'haiAn', text: 'Hải An' },
            { value: 'hongBang', text: 'Hồng Bàng' },
            { value: 'kienAn', text: 'Kiến An' },
            { value: 'kienThuy', text: 'Kiến Thụy' },
            { value: 'leChan', text: 'Lê Chân' },
            { value: 'ngoQuyen', text: 'Ngô Quyền' },
            { value: 'thuyNguyen', text: 'Thủy Nguyên' },
            { value: 'tienLang', text: 'Tiên Lãng' },
            { value: 'vinhBao', text: 'Vĩnh Bảo' }
        ],

        haugiang: [
            { value: 'chauThanh', text: 'Châu Thành' },
            { value: 'chauThanhA', text: 'Châu Thành A' },
            { value: 'longMy', text: 'Long Mỹ' },
            { value: 'nghiXuan', text: 'Nghi Xuân' },
            { value: 'phungHiep', text: 'Phụng Hiệp' },
            { value: 'viThanh', text: 'Vị Thanh' },
            { value: 'viThuy', text: 'Vị Thủy' }
        ],

        hoabinh: [
            { value: 'caoPhong', text: 'Cao Phong' },
            { value: 'daBac', text: 'Đà Bắc' },
            { value: 'hoaBinh', text: 'Hòa Bình' },
            { value: 'kimBoi', text: 'Kim Bôi' },
            { value: 'lacSon', text: 'Lạc Sơn' },
            { value: 'lacThuy', text: 'Lạc Thủy' },
            { value: 'luongSon', text: 'Lương Sơn' },
            { value: 'maiChau', text: 'Mai Châu' },
            { value: 'tanLac', text: 'Tân Lạc' },
            { value: 'yenThuy', text: 'Yên Thủy' }
        ],

        hungyen: [
            { value: 'anThi', text: 'Ân Thi' },
            { value: 'khoaiChau', text: 'Khoái Châu' },
            { value: 'kimDong', text: 'Kim Động' },
            { value: 'myHao', text: 'Mỹ Hào' },
            { value: 'phuCu', text: 'Phù Cừ' },
            { value: 'tienLu', text: 'Tiên Lữ' },
            { value: 'vanGiang', text: 'Văn Giang' },
            { value: 'vanLam', text: 'Văn Lâm' },
            { value: 'yenMy', text: 'Yên Mỹ' }
        ],

        khanhhoa: [
            { value: 'camLam', text: 'Cam Lâm' },
            { value: 'camRanh', text: 'Cam Ranh' },
            { value: 'dienKhanh', text: 'Diên Khánh' },
            { value: 'khanhSon', text: 'Khánh Sơn' },
            { value: 'khanhVinh', text: 'Khánh Vĩnh' },
            { value: 'nhaTrang', text: 'Nha Trang' },
            { value: 'ninhHoa', text: 'Ninh Hòa' },
            { value: 'truongSa', text: 'Trường Sa' },
            { value: 'vanNinh', text: 'Vạn Ninh' }
        ],

        kontum: [
            { value: 'dakGlei', text: 'Đắk Glei' },
            { value: 'dakHa', text: 'Đắk Hà' },
            { value: 'dakTo', text: 'Đắk Tô' },
            { value: 'konPlong', text: 'Kon Plông' },
            { value: 'konRay', text: 'Kon Rẫy' },
            { value: 'ngocHoi', text: 'Ngọc Hồi' },
            { value: 'saThay', text: 'Sa Thầy' },
            { value: 'tuMoRong', text: 'Tu Mơ Rông' }
        ],

        laichau: [
            { value: 'laichau', text: 'Lai Châu' },
            { value: 'muongTe', text: 'Mường Tè' },
            { value: 'namNhun', text: 'Nậm Nhùn' },
            { value: 'phongTho', text: 'Phong Thổ' },
            { value: 'sinHo', text: 'Sìn Hồ' },
            { value: 'tamDuong', text: 'Tam Đường' },
            { value: 'tanUyen', text: 'Tân Uyên' },
            { value: 'thanUyen', text: 'Than Uyên' }
        ],

        lamdong: [
            { value: 'baoLam', text: 'Bảo Lâm' },
            { value: 'baoLoc', text: 'Bảo Lộc' },
            { value: 'catTien', text: 'Cát Tiên' },
            { value: 'daLat', text: 'Đà Lạt' },
            { value: 'daTeh', text: 'Đạ Tẻh' },
            { value: 'daHuoai', text: 'Đạ Huoai' },
            { value: 'damRong', text: 'Đam Rông' },
            { value: 'diLinh', text: 'Di Linh' },
            { value: 'ducTrong', text: 'Đức Trọng' },
            { value: 'lacDuong', text: 'Lạc Dương' },
            { value: 'lamHa', text: 'Lâm Hà' }
        ],

        langson: [
            { value: 'bacSon', text: 'Bắc Sơn' },
            { value: 'binhGia', text: 'Bình Gia' },
            { value: 'caoLoc', text: 'Cao Lộc' },
            { value: 'chiLinh', text: 'Chí Linh' },
            { value: 'dinLang', text: 'Đình Lập' },
            { value: 'hữuLung', text: 'Hữu Lũng' },
            { value: 'langSon', text: 'Lạng Sơn' },
            { value: 'locBinh', text: 'Lộc Bình' },
            { value: 'trangDinh', text: 'Tràng Định' },
            { value: 'vanLang', text: 'Văn Lãng' },
            { value: 'vanQuan', text: 'Văn Quan' }
        ],

        laocai: [
            { value: 'bacHa', text: 'Bắc Hà' },
            { value: 'baoThang', text: 'Bảo Thắng' },
            { value: 'baoYen', text: 'Bảo Yên' },
            { value: 'batXat', text: 'Bát Xát' },
            { value: 'laoCai', text: 'Lào Cai' },
            { value: 'muongKhuong', text: 'Mường Khương' },
            { value: 'saPa', text: 'Sa Pa' },
            { value: 'siMaCai', text: 'Si Ma Cai' },
            { value: 'vanBan', text: 'Văn Bàn' }
        ],

        longan: [
            { value: 'benLuc', text: 'Bến Lức' },
            { value: 'canGiuoc', text: 'Cần Giuộc' },
            { value: 'canDuoc', text: 'Cần Đước' },
            { value: 'châuThanh', text: 'Châu Thành' },
            { value: 'ducHoa', text: 'Đức Hòa' },
            { value: 'ducHue', text: 'Đức Huệ' },
            { value: 'kienTuong', text: 'Kiến Tường' },
            { value: 'longAn', text: 'Long An' },
            { value: 'mocHoa', text: 'Mộc Hóa' },
            { value: 'tanAn', text: 'Tân An' },
            { value: 'tanHung', text: 'Tân Hưng' },
            { value: 'tanThanh', text: 'Tân Thạnh' },
            { value: 'tanTru', text: 'Tân Trụ' },
            { value: 'thanhHoa', text: 'Thạnh Hóa' },
            { value: 'thuThua', text: 'Thủ Thừa' },
            { value: 'vĩnhHung', text: 'Vĩnh Hưng' }
        ],

        namdinh: [
            { value: 'giaoThuy', text: 'Giao Thủy' },
            { value: 'haiHau', text: 'Hải Hậu' },
            { value: 'myLoc', text: 'Mỹ Lộc' },
            { value: 'namDinh', text: 'Nam Định' },
            { value: 'nghiaHung', text: 'Nghĩa Hưng' },
            { value: 'trucNinh', text: 'Trực Ninh' },
            { value: 'vuBan', text: 'Vụ Bản' },
            { value: 'xuanTruong', text: 'Xuân Trường' },
            { value: 'yYen', text: 'Ý Yên' }
        ],

        nghean: [
            { value: 'anhSon', text: 'Anh Sơn' },
            { value: 'conCuong', text: 'Con Cuông' },
            { value: 'cuaLo', text: 'Cửa Lò' },
            { value: 'dienChau', text: 'Diễn Châu' },
            { value: 'doLuong', text: 'Đô Lương' },
            { value: 'hoangMai', text: 'Hoàng Mai' },
            { value: 'huongNguyen', text: 'Hương Nguyên' },
            { value: 'kySon', text: 'Kỳ Sơn' },
            { value: 'namDan', text: 'Nam Đàn' },
            { value: 'nghiLoc', text: 'Nghi Lộc' },
            { value: 'ngheAn', text: 'Nghệ An' },
            { value: 'phuDuc', text: 'Phú Đức' },
            { value: 'phuLuong', text: 'Phú Lương' },
            { value: 'quaLoc', text: 'Quỳnh Lộc' },
            { value: 'quyHop', text: 'Quỳ Hợp' },
            { value: 'quyChau', text: 'Quỳ Châu' },
            { value: 'tanKy', text: 'Tân Kỳ' },
            { value: 'thaiHoa', text: 'Thái Hòa' },
            { value: 'thanhChuong', text: 'Thanh Chương' },
            { value: 'tuongDuong', text: 'Tương Dương' },
            { value: 'vinh', text: 'Vinh' },
            { value: 'yenThanh', text: 'Yên Thành' }
        ],

        ninhbinh: [
            { value: 'giaVien', text: 'Gia Viễn' },
            { value: 'hoaLư', text: 'Hoa Lư' },
            { value: 'kimSon', text: 'Kim Sơn' },
            { value: 'nhoQuan', text: 'Nho Quan' },
            { value: 'tamDiep', text: 'Tam Điệp' },
            { value: 'yenKhanh', text: 'Yên Khánh' },
            { value: 'yenMo', text: 'Yên Mô' }
        ],

        phutho: [
            { value: 'camKhe', text: 'Cẩm Khê' },
            { value: 'doanHung', text: 'Đoan Hùng' },
            { value: 'haHoa', text: 'Hạ Hòa' },
            { value: 'lamThao', text: 'Lâm Thao' },
            { value: 'phuTho', text: 'Phú Thọ' },
            { value: 'phuNinh', text: 'Phù Ninh' },
            { value: 'quynhNhai', text: 'Quỳnh Nhai' },
            { value: 'tamNong', text: 'Tam Nông' },
            { value: 'tanSon', text: 'Tân Sơn' },
            { value: 'thanhBa', text: 'Thanh Ba' },
            { value: 'thanhSon', text: 'Thanh Sơn' },
            { value: 'thanhThuy', text: 'Thanh Thủy' },
            { value: 'vietTri', text: 'Việt Trì' },
            { value: 'yenLập', text: 'Yên Lập' }
        ],

        phuyen: [
            { value: 'dongHoa', text: 'Đông Hòa' },
            { value: 'dongXuan', text: 'Đồng Xuân' },
            { value: 'phuHoa', text: 'Phú Hòa' },
            { value: 'songCau', text: 'Sông Cầu' },
            { value: 'songHinh', text: 'Sông Hinh' },
            { value: 'sonHoa', text: 'Sơn Hòa' },
            { value: 'tuyAn', text: 'Tuy An' },
            { value: 'tuyHoa', text: 'Tuy Hòa' }
        ],

        quangbinh: [
            { value: 'baDon', text: 'Ba Đồn' },
            { value: 'boTrach', text: 'Bố Trạch' },
            { value: 'dongHoi', text: 'Đồng Hới' },
            { value: 'leThuy', text: 'Lệ Thủy' },
            { value: 'minhHoa', text: 'Minh Hóa' },
            { value: 'quangNinh', text: 'Quảng Ninh' },
            { value: 'quangTrach', text: 'Quảng Trạch' },
            { value: 'tuyenHoa', text: 'Tuyên Hóa' }
        ],

        quangnam: [
            { value: 'dienBan', text: 'Điện Bàn' },
            { value: 'hienHải', text: 'Hiên Hải' },
            { value: 'hoai', text: 'Hội An' },
            { value: 'namGiang', text: 'Nam Giang' },
            { value: 'namTraMy', text: 'Nam Trà My' },
            { value: 'nuiThanh', text: 'Núi Thành' },
            { value: 'phuNinh', text: 'Phú Ninh' },
            { value: 'phuocSon', text: 'Phước Sơn' },
            { value: 'queSon', text: 'Quế Sơn' },
            { value: 'quangNam', text: 'Quảng Nam' },
            { value: 'tienPhuoc', text: 'Tiên Phước' },
            { value: 'tangBinh', text: 'Tảng Bình' },
            { value: 'thangBinh', text: 'Thăng Bình' },
            { value: 'tayGiang', text: 'Tây Giang' },
            { value: 'daiLoc', text: 'Đại Lộc' },
            { value: 'dongGiang', text: 'Đông Giang' },
            { value: 'duyXuyen', text: 'Duy Xuyên' }
        ],

        quangngai: [
            { value: 'baTo', text: 'Ba Tơ' },
            { value: 'binhSon', text: 'Bình Sơn' },
            { value: 'ducPho', text: 'Đức Phổ' },
            { value: 'minhLong', text: 'Minh Long' },
            { value: 'moDuc', text: 'Mộ Đức' },
            { value: 'nghiaHanh', text: 'Nghĩa Hành' },
            { value: 'quangNgai', text: 'Quảng Ngãi' },
            { value: 'sonHa', text: 'Sơn Hà' },
            { value: 'sonTay', text: 'Sơn Tây' },
            { value: 'sonTinh', text: 'Sơn Tịnh' },
            { value: 'tayTra', text: 'Tây Trà' },
            { value: 'tràBong', text: 'Trà Bồng' },
            { value: 'tuNghia', text: 'Tư Nghĩa' }
        ],

        quangninh: [
            { value: 'baChe', text: 'Ba Chẽ' },
            { value: 'binhLieu', text: 'Bình Liêu' },
            { value: 'camPha', text: 'Cẩm Phả' },
            { value: 'coTo', text: 'Cô Tô' },
            { value: 'dongTrieu', text: 'Đông Triều' },
            { value: 'haLong', text: 'Hạ Long' },
            { value: 'haiHa', text: 'Hải Hà' },
            { value: 'hoanhBo', text: 'Hoành Bồ' },
            { value: 'mongCai', text: 'Móng Cái' },
            { value: 'quangNinh', text: 'Quảng Ninh' },
            { value: 'tienYen', text: 'Tiên Yên' },
            { value: 'uNgoc', text: 'U Ngọc' },
            { value: 'vanDon', text: 'Vân Đồn' },
            { value: 'yenHung', text: 'Yên Hưng' }
        ],

        quangtri: [
            { value: 'camLo', text: 'Cam Lộ' },
            { value: 'daoConCo', text: 'Đảo Cồn Cỏ' },
            { value: 'dongHa', text: 'Đông Hà' },
            { value: 'gioLinh', text: 'Gio Linh' },
            { value: 'haiLang', text: 'Hải Lăng' },
            { value: 'huongHoa', text: 'Hướng Hóa' },
            { value: 'quangTri', text: 'Quảng Trị' },
            { value: 'trieuPhong', text: 'Triệu Phong' },
            { value: 'vinhLinh', text: 'Vĩnh Linh' }
        ],

        soctrang: [
            { value: 'chauThanh', text: 'Châu Thành' },
            { value: 'cuLaoDung', text: 'Cù Lao Dung' },
            { value: 'keSach', text: 'Kế Sách' },
            { value: 'longPhu', text: 'Long Phú' },
            { value: 'myTu', text: 'Mỹ Tú' },
            { value: 'myXuyen', text: 'Mỹ Xuyên' },
            { value: 'ngaNam', text: 'Ngã Năm' },
            { value: 'socTrang', text: 'Sóc Trăng' },
            { value: 'thanhTri', text: 'Thạnh Trị' },
            { value: 'tranDe', text: 'Trần Đề' },
            { value: 'vĩnhChau', text: 'Vĩnh Châu' }
        ],

        sonla: [
            { value: 'bacYen', text: 'Bắc Yên' },
            { value: 'maiSon', text: 'Mai Sơn' },
            { value: 'mocChau', text: 'Mộc Châu' },
            { value: 'muongLa', text: 'Mường La' },
            { value: 'phuYen', text: 'Phù Yên' },
            { value: 'quynhNhai', text: 'Quỳnh Nhai' },
            { value: 'songMa', text: 'Sông Mã' },
            { value: 'sonLa', text: 'Sơn La' },
            { value: 'sopCop', text: 'Sốp Cộp' },
            { value: 'thuanChau', text: 'Thuận Châu' },
            { value: 'vanHo', text: 'Vân Hồ' },
            { value: 'yenChau', text: 'Yên Châu' }
        ],

        tayninh: [
            { value: 'benCau', text: 'Bến Cầu' },
            { value: 'chauThanh', text: 'Châu Thành' },
            { value: 'duongMinhChau', text: 'Dương Minh Châu' },
            { value: 'goDau', text: 'Gò Dầu' },
            { value: 'hoaThanh', text: 'Hoà Thành' },
            { value: 'longThanh', text: 'Long Thành' },
            { value: 'tanBien', text: 'Tân Biên' },
            { value: 'tanChau', text: 'Tân Châu' },
            { value: 'tayNinh', text: 'Tây Ninh' },
            { value: 'trangBang', text: 'Trảng Bàng' }
        ],

        thaibinh: [
            { value: 'dongHung', text: 'Đông Hưng' },
            { value: 'hungHa', text: 'Hưng Hà' },
            { value: 'kienXuong', text: 'Kiến Xương' },
            { value: 'quynhPhu', text: 'Quỳnh Phụ' },
            { value: 'thaiBinh', text: 'Thái Bình' },
            { value: 'tienHai', text: 'Tiền Hải' },
            { value: 'vuThu', text: 'Vũ Thư' }
        ],

        thainguyen: [
            { value: 'bacSon', text: 'Bắc Sơn' },
            { value: 'chonThanh', text: 'Chơn Thành' },
            { value: 'daiTu', text: 'Đại Từ' },
            { value: 'dinhHoa', text: 'Định Hóa' },
            { value: 'dongHy', text: 'Đồng Hỷ' },
            { value: 'phuBinh', text: 'Phú Bình' },
            { value: 'phuLuong', text: 'Phú Lương' },
            { value: 'phoYen', text: 'Phổ Yên' },
            { value: 'sinhChau', text: 'Sịnh Châu' },
            { value: 'songCong', text: 'Sông Công' },
            { value: 'thaiNguyen', text: 'Thái Nguyên' },
            { value: 'voNhai', text: 'Võ Nhai' }
        ],

        thanhhoa: [
            { value: 'baThuoc', text: 'Bá Thước' },
            { value: 'binhSon', text: 'Bình Sơn' },
            { value: 'camThuy', text: 'Cẩm Thủy' },
            { value: 'dongSon', text: 'Đông Sơn' },
            { value: 'hauLoc', text: 'Hậu Lộc' },
            { value: 'hoangHoa', text: 'Hoàng Hóa' },
            { value: 'langChanh', text: 'Lang Chánh' },
            { value: 'longSon', text: 'Long Sơn' },
            { value: 'muongLát', text: 'Mường Lát' },
            { value: 'ngaSon', text: 'Nga Sơn' },
            { value: 'ngocLac', text: 'Ngọc Lặc' },
            { value: 'nhuThanh', text: 'Như Thanh' },
            { value: 'nhuXuan', text: 'Như Xuân' },
            { value: 'nôngCông', text: 'Nông Cống' },
            { value: 'quangSon', text: 'Quảng Sơn' },
            { value: 'samSon', text: 'Sầm Sơn' },
            { value: 'tanSon', text: 'Tân Sơn' },
            { value: 'thachThanh', text: 'Thạch Thành' },
            { value: 'thanhHoa', text: 'Thanh Hóa' },
            { value: 'thieuHoa', text: 'Thiệu Hóa' },
            { value: 'thọXuan', text: 'Thọ Xuân' },
            { value: 'thuậnHoa', text: 'Thuận Hóa' },
            { value: 'truongSon', text: 'Trường Sơn' },
            { value: 'tuongLoc', text: 'Tương Lộc' },
            { value: 'vĩnhLoc', text: 'Vĩnh Lộc' },
            { value: 'yenDinh', text: 'Yên Định' },
            { value: 'yenSon', text: 'Yên Sơn' }
        ],


        thuathienhue: [
            { value: 'aLuoi', text: 'A Lưới' },
            { value: 'huongTra', text: 'Hương Trà' },
            { value: 'huongThuy', text: 'Hương Thủy' },
            { value: 'namDong', text: 'Nam Đông' },
            { value: 'phongDien', text: 'Phong Điền' },
            { value: 'phuLoc', text: 'Phú Lộc' },
            { value: 'phuVang', text: 'Phú Vang' },
            { value: 'quangDien', text: 'Quảng Điền' },
            { value: 'thuaThienHue', text: 'Thừa Thiên Huế' },
            { value: 'truongAn', text: 'Trường An' },
            { value: 'vinhPhu', text: 'Vĩnh Phú' }
        ],

        tiengiang: [
            { value: 'caiBe', text: 'Cái Bè' },
            { value: 'caiLậy', text: 'Cai Lậy' },
            { value: 'choGao', text: 'Chợ Gạo' },
            { value: 'goCong', text: 'Gò Công' },
            { value: 'goCongDong', text: 'Gò Công Đông' },
            { value: 'goCongTay', text: 'Gò Công Tây' },
            { value: 'myTho', text: 'Mỹ Tho' },
            { value: 'tanPhuDong', text: 'Tân Phú Đông' },
            { value: 'tanPhong', text: 'Tân Phong' },
            { value: 'tanThanh', text: 'Tân Thành' },
            { value: 'tienGiang', text: 'Tiền Giang' }
        ],

        travinh: [
            { value: 'cangLong', text: 'Càng Long' },
            { value: 'chauThanh', text: 'Châu Thành' },
            { value: 'cauKe', text: 'Cầu Kè' },
            { value: 'cauNgang', text: 'Cầu Ngang' },
            { value: 'duyenHai', text: 'Duyên Hải' },
            { value: 'traCu', text: 'Trà Cú' },
            { value: 'traVinh', text: 'Trà Vinh' }
        ],

        tuyenquang: [
            { value: 'chieuHoa', text: 'Chiêu Hoá' },
            { value: 'hamYen', text: 'Hàm Yên' },
            { value: 'lacBinh', text: 'Lạc Bình' },
            { value: 'nàHang', text: 'Nà Hang' },
            { value: 'sonDuong', text: 'Sơn Dương' },
            { value: 'tuyenQuang', text: 'Tuyên Quang' },
            { value: 'yenSon', text: 'Yên Sơn' }
        ],

        vinhlong: [
            { value: 'binhTan', text: 'Bình Tân' },
            { value: 'longHo', text: 'Long Hồ' },
            { value: 'manhThanh', text: 'Mãnh Thạnh' },
            { value: 'vinhLong', text: 'Vĩnh Long' },
            { value: 'tràOn', text: 'Trà Ôn' },
            { value: 'vungLiem', text: 'Vũng Liêm' }
        ],

        vinhphuc: [
            { value: 'binhXuyen', text: 'Bình Xuyên' },
            { value: 'lapThach', text: 'Lập Thạch' },
            { value: 'longThang', text: 'Long Thắng' },
            { value: 'phucYen', text: 'Phúc Yên' },
            { value: 'sonNam', text: 'Sơn Nam' },
            { value: 'tamDao', text: 'Tam Đảo' },
            { value: 'tamDuong', text: 'Tam Dương' },
            { value: 'vinhPhuc', text: 'Vĩnh Phúc' },
            { value: 'vinhYen', text: 'Vĩnh Yên' },
            { value: 'yenLac', text: 'Yên Lạc' }
        ],

        yenbai: [
            { value: 'lucYen', text: 'Lục Yên' },
            { value: 'mùCangChải', text: 'Mù Cang Chải' },
            { value: 'tranYên', text: 'Trấn Yên' },
            { value: 'tranYen', text: 'Trấn Yên' },
            { value: 'vanChan', text: 'Văn Chấn' },
            { value: 'vanYen', text: 'Văn Yên' },
            { value: 'yenBai', text: 'Yên Bái' },
            { value: 'yenBinh', text: 'Yên Bình' }
        ]
    },
    wards: {
        ba_dinh: [
            { value: 'cong_vi', text: 'Cống Vị' },
            { value: 'dieu_ngoc', text: 'Điện Biên' },
            { value: 'doi_can', text: 'Đội Cấn' },
            { value: 'giang_vo', text: 'Giảng Võ' },
            { value: 'kim_ma', text: 'Kim Mã' },
            { value: 'lien_dong', text: 'Liễu Giai' },
            { value: 'nguyen_trai', text: 'Nguyễn Trung Trực' },
            { value: 'ngoc_ha', text: 'Ngọc Hà' },
            { value: 'ngoc_khanh', text: 'Ngọc Khánh' },
            { value: 'phuc_xa', text: 'Phúc Xá' },
            { value: 'quan_thanh', text: 'Quán Thánh' },
            { value: 'thanh_cong', text: 'Thành Công' },
            { value: 'truc_bach', text: 'Trúc Bạch' },
            { value: 'van_ba', text: 'Vĩnh Phúc' }
        ],
        cau_giay: [
            { value: 'mai_dich', text: 'Mai Dịch' },
            { value: 'nghia_do', text: 'Nghĩa Đô' },
            { value: 'nghia_tan', text: 'Nghĩa Tân' },
            { value: 'quan_hoa', text: 'Quan Hoa' },
            { value: 'trung_hoa', text: 'Trung Hòa' },
            { value: 'yen_hoa', text: 'Yên Hòa' },
            { value: 'dich_vong', text: 'Dịch Vọng' },
            { value: 'dich_vong_hau', text: 'Dịch Vọng Hậu' }
        ],
        dong_da: [
            { value: 'cat_linh', text: 'Cát Linh' },
            { value: 'dong_cac', text: 'Ô Chợ Dừa' },
            { value: 'khâm_thiên', text: 'Khâm Thiên' },
            { value: 'lang_ha', text: 'Láng Hạ' },
            { value: 'lang_thuong', text: 'Láng Thượng' },
            { value: 'phuong_mai', text: 'Phương Mai' },
            { value: 'quoc_tu_giam', text: 'Quốc Tử Giám' },
            { value: 'thuong_dinh', text: 'Thượng Đình' },
            { value: 'thinh_quang', text: 'Thịnh Quang' },
            { value: 'trung_phan', text: 'Trung Liệt' },
            { value: 'van_chuong', text: 'Văn Chương' },
            { value: 'van_mieu', text: 'Văn Miếu' },
            { value: 'khương_thượng', text: 'Khương Thượng' }
        ],
        quan1: [
            { value: 'ben_nghe', text: 'Bến Nghé' },
            { value: 'ben_thanh', text: 'Bến Thành' }
            // Thêm các xã/phường khác
        ],
        quan2: [
            { value: 'an_phu', text: 'An Phú' },
            { value: 'binh_an', text: 'Bình An' }
            // Thêm các xã/phường khác
        ],
        haichau: [
            { value: 'binh_hien', text: 'Bình Hiên' },
            { value: 'binh_thuan', text: 'Bình Thuận' }
            // Thêm các xã/phường khác
        ],
        thanhkhe: [
            { value: 'xuan_ha', text: 'Xuân Hà' },
            { value: 'tam_thuan', text: 'Tam Thuận' }
            // Thêm các xã/phường khác
        ]
    }
};

window.onload = function() {
    const provinceSelect = document.getElementById('province');
    data.provinces.forEach(province => {
        const option = document.createElement('option');
        option.value = province.value;
        option.text = province.text;
        provinceSelect.appendChild(option);
    });
};

function updateDistricts() {
    const provinceSelect = document.getElementById('province');
    const districtSelect = document.getElementById('district');
    const selectedProvince = provinceSelect.value;

    // Clear existing options
    districtSelect.innerHTML = '<option value:"">Chọn Huyện/Quận</option>';

    if (selectedProvince && data.districts[selectedProvince]) {
        const districts = data.districts[selectedProvince];
        districts.forEach(district => {
            const option = document.createElement('option');
            option.value = district.value;
            option.text = district.text;
            districtSelect.appendChild(option);
        });
    }

    // Clear the wards dropdown
    document.getElementById('ward').innerHTML = '<option value:"">Chọn Xã/Phường</option>';
}

function updateWards() {
    const districtSelect = document.getElementById('district');
    const wardSelect = document.getElementById('ward');
    const selectedDistrict = districtSelect.value;

    // Clear existing options
    wardSelect.innerHTML = '<option value:"">Chọn Xã/Phường</option>';

    if (selectedDistrict && data.wards[selectedDistrict]) {
        const wards = data.wards[selectedDistrict];
        wards.forEach(ward => {
            const option = document.createElement('option');
            option.value = ward.value;
            option.text = ward.text;
            wardSelect.appendChild(option);
        });
    }
}