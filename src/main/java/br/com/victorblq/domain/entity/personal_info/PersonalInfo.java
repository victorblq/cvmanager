package br.com.victorblq.domain.entity.personal_info;

import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.OneToMany;
import javax.validation.constraints.NotEmpty;

import org.hibernate.annotations.Fetch;
import org.hibernate.annotations.FetchMode;

import br.com.victorblq.domain.entity.AbstractEntity;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, 12/26/2018
 */
@Data
@Entity
@EqualsAndHashCode(callSuper=true)
@NoArgsConstructor
public class PersonalInfo extends AbstractEntity{

	private static final long serialVersionUID = -5614379199994541271L;
	
	@NotEmpty
	@Column(length=30, nullable=false)
	private String title;
	@Column(length=50)
    private String subtitle;
    @NotEmpty
    @Column(length=100, nullable=false)
	private String firstName;
    @Column(length=100)
	private String lastName;
	@Column(columnDefinition="TEXT")
	private String aboutMe;
	@Column(columnDefinition="TEXT")
	private String image;
	@OneToMany(fetch=FetchType.EAGER, mappedBy="personalInfo")
	@Fetch(FetchMode.SUBSELECT)
	private List<Phone> phones;
	@OneToMany(fetch=FetchType.EAGER, mappedBy="personalInfo")
	@Fetch(FetchMode.SUBSELECT)
	private List<Email> emails;
	@OneToMany(fetch=FetchType.EAGER, mappedBy="personalInfo")
	@Fetch(FetchMode.SUBSELECT)
	private List<Reference> references;
	
	public void update(PersonalInfo personalInfo) {
		if(personalInfo.image != null) {
			this.image = personalInfo.image;
		}
		
		this.title = personalInfo.title;
		this.subtitle = personalInfo.subtitle;
		this.firstName = personalInfo.firstName;
		this.lastName = personalInfo.lastName;
		this.aboutMe = personalInfo.aboutMe;
	}
}